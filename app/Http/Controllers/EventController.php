<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommonFunctions;
use App\Models\Venue;
use App\Models\WeddingEvent;

class EventController extends Controller
{
    use CommonFunctions;

    public function index()
    {
        return view('admin.event.list');
    }

    public function load(Request $request)
    {
        try {
            $draw = intval($request->get('draw', 0));
            $start = intval($request->get('start', 0));
            $length = intval($request->get('length', 10));
            $searchValue = $request->input('search.value', '');

            $query = WeddingEvent::where('is_groom',session('groom_side'));
            if (!empty($searchValue)) {
                $query->where(function ($q) use ($searchValue) {
                    $q->where('name', 'like', "%{$searchValue}%");
                });
            }
            $recordsTotal = WeddingEvent::where('is_groom',session('groom_side'))->count();
            $recordsFiltered = $query->count();
            $rows = $query->offset($start)->limit($length)->orderBy('id', 'desc')->get();

            $formattedData = [];
            foreach ($rows as $index => $row) {
                $actions = '<div class="edit-delete-action">';
                    $actions .= '<a href="' . url('admin/events/'.$row->id.'/edit/') . '" class="me-2 edit-icon p-2 text-success" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </a>';
                    $actions .= '<a href="javascript:;" onclick="remove_row(\'' . url('admin/events/' . $row->id) . '\')" data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" title="Delete">
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
                    'name' => $row->name,
                    'date' => $this->format_date($row->date),
                    'time' => $this->format_time($row->start_time)." <b>To</b> ".$this->format_time($row->end_time),
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
        $event = null;
        $venues = Venue::select("id","name")->where(["is_active" => 1,"is_groom" => session('groom_side')])->orderBy('name','asc')->get();
        return view('admin.event.add_edit',compact('event','venues'));
    }

    public function store(Request $request)
    {
        try {
            $post = $request->all();

            if($post['is_groom'] == 2) {
                $bride = new WeddingEvent;
                $bride->name = $post['name'];
                $bride->date = $post['date'];
                $bride->start_time = $post['start_time'];
                $bride->end_time = $post['end_time'];
                $bride->address = $post['address'];
                $bride->venue_id = $post['venue_id'];
                $bride->contact_no = $post['contact_no'];
                $bride->is_groom = 0;
                $bride->is_active = $post['is_active'];
                $bride->created_at = date("Y-m-d H:i:s");
                $bride->save();

                $groom = new WeddingEvent;
                $groom->name = $post['name'];
                $groom->date = $post['date'];
                $groom->start_time = $post['start_time'];
                $groom->end_time = $post['end_time'];
                $groom->address = $post['address'];
                $groom->venue_id = $post['venue_id'];
                $groom->contact_no = $post['contact_no'];
                $groom->is_groom = 1;
                $groom->is_active = $post['is_active'];
                $groom->created_at = date("Y-m-d H:i:s");
                $groom->save();
            } else {
                $row = new WeddingEvent;
                $row->name = $post['name'];
                $row->date = $post['date'];
                $row->start_time = $post['start_time'];
                $row->end_time = $post['end_time'];
                $row->address = $post['address'];
                $row->venue_id = $post['venue_id'];
                $row->contact_no = $post['contact_no'];
                $row->is_groom = $post['is_groom'];
                $row->is_active = $post['is_active'];
                $row->created_at = date("Y-m-d H:i:s");
                $row->save();
            }
            return response()->json(['success' => true,'message' => "Event added successfully."], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => $e->getMessage()], 200);
        }
    }

    public function edit($id)
    {
        $event = WeddingEvent::find($id);
        if(!$event) {
            return redirect()->route("admin.dashboard");
        }
        $venues = Venue::select("id","name")->where(["is_active" => 1,"is_groom" => session('groom_side')])->orderBy('name','asc')->get();
        return view('admin.event.add_edit',compact('event','venues'));   
    }

    public function update(Request $request,$id)
    {
        try {
            $post = $request->all();

            $row = WeddingEvent::find($id);
            $row->name = $post['name'];
            $row->date = $post['date'];
            $row->start_time = $post['start_time'];
            $row->end_time = $post['end_time'];
            $row->address = $post['address'];
            $row->venue_id = $post['venue_id'];
            $row->contact_no = $post['contact_no'];
            $row->is_groom = $post['is_groom'];
            $row->is_active = $post['is_active'];
            $row->updated_at = date("Y-m-d H:i:s");
            $row->save();

            return response()->json(['success' => true,'message' => "Event edited successfully."], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => $e->getMessage()], 200);
        }
    }

    public function destroy($id)
    {
        WeddingEvent::destroy($id);
        return response()->json(['success' => true,'message' => "Event removed successfully."], 200);
    }
}
