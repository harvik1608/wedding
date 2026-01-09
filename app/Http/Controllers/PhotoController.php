<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommonFunctions;
use App\Models\Photo;

class PhotoController extends Controller
{
    use CommonFunctions;

    public function index()
    {
        return view('admin.photo.list');
    }

    public function load(Request $request)
    {
        try {
            $draw = intval($request->get('draw', 0));
            $start = intval($request->get('start', 0));
            $length = intval($request->get('length', 10));
            $searchValue = $request->input('search.value', '');

            $query = Photo::where('is_groom',session('groom_side'));
            if (!empty($searchValue)) {
                $query->where(function ($q) use ($searchValue) {
                    // $q->where('name', 'like', "%{$searchValue}%");
                    // $q->where('relation', 'like', "%{$searchValue}%");
                });
            }
            $recordsTotal = Photo::where('is_groom',session('groom_side'))->count();
            $recordsFiltered = $query->count();
            $rows = $query->offset($start)->limit($length)->orderBy('id', 'desc')->get();

            $formattedData = [];
            foreach ($rows as $index => $row) {
                $actions = '<div class="edit-delete-action">';
                    $actions .= '<a href="javascript:;" onclick="remove_row(\'' . url('admin/photos/' . $row->id) . '\')" data-bs-toggle="modal" data-bs-target="#delete-modal" class="p-2" title="Delete">
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
                    'avatar' => '<img src="'.asset('uploads/photo/'.$row->avatar).'" style="width: 100px;height: 100px;" class="img img-thumbnail img-responsive" />',
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
        $photo = null;
        return view('admin.photo.add_edit',compact('photo'));
    }

    public function store(Request $request)
    {
        try {
            $__post = $request->all();
            $avatar = $this->uploadImage($request,'avatar','uploads/photo',$__post['old_avatar'] ?? null);

            $row = new Photo;
            $row->avatar = $avatar;
            $row->is_groom = 1;
            $row->created_at = date("Y-m-d H:i:s");
            $row->save();

            return response()->json(['success' => true,'message' => "Photo added successfully."], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => $e->getMessage()], 200);
        }
    }

    public function destroy($id)
    {
        Photo::destroy($id);
        return response()->json(['success' => true,'message' => "Photo removed successfully."], 200);
    }
}
