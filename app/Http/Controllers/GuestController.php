<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommonFunctions;
use App\Models\Venue;
use App\Models\WeddingEvent;
use App\Models\Guest;
use App\Models\Group;
use App\Models\Event_guest;

class GuestController extends Controller
{
    use CommonFunctions;

    public function index()
    {
        return view('admin.guest.list');
    }

    public function load(Request $request)
    {
        try {
            $draw = intval($request->get('draw', 0));
            $start = intval($request->get('start', 0));
            $length = intval($request->get('length', 10));
            $searchValue = $request->input('search.value', '');

            $query = Guest::where('is_groom',session('groom_side'));
            if (!empty($searchValue)) {
                $query->where(function ($q) use ($searchValue) {
                    $q->where('guest_name', 'like', "%{$searchValue}%");
                });
            }
            $recordsTotal = Guest::where('is_groom',session('groom_side'))->count();
            $recordsFiltered = $query->count();
            $rows = $query->offset($start)->limit($length)->orderBy('id', 'desc')->get();

            $formattedData = [];
            foreach ($rows as $index => $row) {
                $actions = '<div class="edit-delete-action">';
                    $actions .= '<a href="' . url('admin/guests/'.$row->id.'/edit/') . '" class="me-2 edit-icon p-2 text-success" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </a>';
                    $actions .= '<a href="javascript:;" onclick="remove_row(\'' . url('admin/guests/' . $row->id) . '\')" data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                    </a>';
                $actions .= '</div>';
                $formattedData[] = [
                    'id' => $start + $index + 1,
                    'name' => $row->guest_name,
                    'phone' => $row->guest_number,
                    'total_child' => $row->total_child,
                    'total_young' => $row->total_young,
                    'total_adult' => $row->total_adult,
                    'status' => $row->is_active
                        ? '<span class="badge badge-success badge-xs d-inline-flex align-items-center">Active</span>'
                        : '<span class="badge badge-danger badge-xs d-inline-flex align-items-center">Inactive</span>',
                    'actions' => $actions
                ];
            }
            return response()->json([
                'draw' => $draw,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $formattedData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function create()
    {
        $guest = null;
        $invited_guests = [];
        $groups = Group::select("id","name")->orderBy('name','asc')->get();
        $venues = Venue::select("id","name")->where(["is_active" => 1,"is_groom" => session('groom_side')])->orderBy('name','asc')->get();
        $events = WeddingEvent::select("id","name")->where(["is_active" => 1,"is_groom" => session('groom_side')])->orderBy('name','asc')->get();
        return view('admin.guest.add_edit',compact('guest','invited_guests','venues','events','groups'));
    }

    public function store(Request $request)
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
            $row->venue_id = $post['venue_id'] ?? 0;
            $row->room_no = $post['room_no'] ?? '';
            $row->rsvp_status = $post['rsvp_status'];
            $row->is_groom = $post['is_groom'];
            $row->is_active = $post['is_active'];
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
            return response()->json(['success' => true,'message' => "Guest added successfully."], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => $e->getMessage()], 200);
        }
    }

    public function edit($id)
    {
        $guest = Guest::find($id);
        if(!$guest) {
            return redirect()->route("admin.dashboard");
        }
        $invited_guests = Event_guest::where('guest_id',$id)->pluck('event_id')->toArray();
        $groups = Group::select("id","name")->orderBy('name','asc')->get();
        $venues = Venue::select("id","name")->where(["is_active" => 1,"is_groom" => session('groom_side')])->orderBy('name','asc')->get();
        $events = WeddingEvent::select("id","name")->where(["is_active" => 1,"is_groom" => session('groom_side')])->orderBy('name','asc')->get();
        return view('admin.guest.add_edit',compact('guest','invited_guests','venues','events','groups'));   
    }

    public function update(Request $request,$id)
    {
        try {
            $post = $request->all();

            $row = Guest::find($id);
            $row->guest_name = $post['guest_name'];
            $row->spouse_name = $post['spouse_name'] ?? '';
            $row->guest_number = $post['guest_number'];
            $row->total_child = $post['total_child'] ?? 0;
            $row->total_young = $post['total_young'] ?? 0;
            $row->total_adult = $post['total_adult'] ?? 0;
            $row->group_id = $post['group_id'];
            $row->is_accommodation = $post['is_accommodation'];
            $row->venue_id = $post['venue_id'] ?? 0;
            $row->room_no = $post['room_no'] ?? '';
            $row->rsvp_status = $post['rsvp_status'];
            $row->is_groom = $post['is_groom'];
            $row->is_active = $post['is_active'];
            $row->created_at = date("Y-m-d H:i:s");
            $row->save();
            $guest_id = $id;

            if($request->has('invitation')) {
                Event_guest::where(['guest_id' => $guest_id])->delete();
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

            return response()->json(['success' => true,'message' => "Guest edited successfully."], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => $e->getMessage()], 200);
        }
    }

    public function destroy($id)
    {
        Guest::destroy($id);
        Event_guest::where(['guest_id' => $id])->delete();
        return response()->json(['success' => true,'message' => "Guest removed successfully."], 200);
    }
}
