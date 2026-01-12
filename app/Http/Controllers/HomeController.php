<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Traits\CommonFunctions;
use App\Models\Story;
use App\Models\Host;
use App\Models\Photo;
use App\Models\Group;
use App\Models\WeddingEvent;
use App\Models\Event_guest;
use App\Models\Guest;
use Auth;

class HomeController extends Controller
{
    use CommonFunctions;

    public function index()
    {
        $data['groom_name'] = $this->general_setting('groom_name');
        $data['bride_name'] = $this->general_setting('bride_name');
        $data['wedding_date'] = $this->general_setting('wedding_date');
        $data['couple_photo'] = $this->general_setting('couple_photo');
        $data['about_bride'] = $this->general_setting('about_bride');
        $data['about_groom'] = $this->general_setting('about_groom');
        $data['wedding_video'] = $this->general_setting('wedding_video');
        $data['bride_photo'] = $this->general_setting('bride_photo');
        $data['groom_photo'] = $this->general_setting('groom_photo');
        $data['stories'] = Story::where('is_active',1)->get();
        $data['hosts'] = Host::where('is_active',1)->get();
        return view('index',$data);
    }

    public function couple()
    {
        $data['groom_name'] = $this->general_setting('groom_name');
        $data['about_groom'] = $this->general_setting('about_groom');
        $data['groom_photo'] = $this->general_setting('groom_photo');
        $data['bride_name'] = $this->general_setting('bride_name');
        $data['about_bride'] = $this->general_setting('about_bride');
        $data['bride_photo'] = $this->general_setting('bride_photo');
        return view('couple',$data);
    }

    public function story()
    {
        $data['stories'] = Story::where('is_active',1)->get();
        return view('story',$data);
    }

    public function host()
    {
        $data['groom_hosts'] = Host::where('is_active',1)->where('is_groom',1)->get();
        $data['bride_hosts'] = Host::where('is_active',1)->where('is_groom','!=',1)->get();
        return view('host',$data);
    }

    public function gallery()
    {
        $data['photos'] = Photo::where('is_active',1)->get();
        return view('gallery',$data);
    }

    public function rsvp()
    {
        $groups = Group::select("id","name")->orderBy('name','asc')->get();
        $events = WeddingEvent::select("id","name")->where(["is_active" => 1])->orderBy('name','asc')->get();
        return view('rsvp',compact('groups','events'));
    }

    public function submit_rsvp(Request $request)
    {
        try {
            $post = $request->all();

            $row = new Guest;
            $row->guest_name = $post['guest_name'];
            $row->spouse_name = $post['spouse_name'] ?? '';
            $row->guest_number = $post['guest_number'];
            $row->total_child = $post['total_child'] ?? 0;
            $row->total_young = $post['total_young'] ?? 0;
            $row->total_adult = $post['total_adult'] ?? 0;
            $row->group_id = $post['group_id'];
            $row->is_accommodation = $post['is_accommodation'];
            $row->venue_id = 0;
            $row->room_no = '';
            $row->rsvp_status = $post['rsvp_status'];
            $row->is_groom = $post['is_groom'];
            $row->is_added_from_website = 1;
            $row->created_at = date("Y-m-d H:i:s");
            $row->save();
            $guest_id = $row->id;

            if($request->has('invitation')) {
                $invitation_data = [];
                foreach($post['invitation'] as $event) {
                    $invitation_data[] = array(
                        'event_id' => $event,
                        'guest_id' => $guest_id,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                }
                $event_row = new Event_guest;
                $event_row->insert($invitation_data);
            }
            return redirect()->route('event');
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => $e->getMessage()], 200);
        }
    }

    public function event()
    {
        if(session()->has('guest_number')) {
            $row = Guest::where('guest_number',session()->get('guest_number'))->where('is_active',1)->first();
            if(!$row) {
                session()->flash('guest_error', "Mobile no. not found.");
                return redirect()->route('event');
            }

            $events = Event_guest::where('guest_id',$row->id)->pluck('event_id');
            if($events->isEmpty()) {
                session()->flash('guest_error', "Events not found.");
                return redirect()->route('event');
            }

            $event_ids = $events->toArray();
            $data['events'] = WeddingEvent::whereIn('id',$event_ids)->where('is_active',1)->get();
            return view('event',$data);
        } else {
            return view('login');
        }
    }

    public function submit_signin(Request $request)
    {
        $post = $request->all();

        $row = Guest::where('guest_number',$post['phone'])->first();
        if(!$row) {
            session()->flash('guest_error', "Mobile no. not found.");
            return redirect()->route('event');
        } else {
            session(['guest_number' => $post['phone']]);
            return redirect()->route('event');
        }
    }

    public function logout(Request $request)
    {
        session()->forget('guest_number');
        return redirect()->route('event');
    }
}
