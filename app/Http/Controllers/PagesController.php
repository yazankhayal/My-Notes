<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function create(){
        return view('pages.create');
    }

    public function edit($id){
        $pages = Pages::where('id', '=', $id)->first();
        if ($pages) {
            return view('pages.edit',compact('pages'));
        }
        return redirect()->back();
    }

    public function post_data(Request $request)
    {
        $edit = $request->id;
        $validation = Validator::make($request->all(), $this->rules($edit));
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        } else {
            if ($edit != null) {
                $item = Pages::where('id', '=', $request->id)->first();
            } else {
                $item = new Pages();
            }

            $item->name = $request->name;
            $item->slug = time() . '-' . str_replace(' ','-',strtolower($request->name));
            $item->body = $request->body;
            if ($request->avatar) {
                $item->avatar = parent::upload_fun($request->avatar,'pages',1);
            }
            $item->save();

            return response()->json(['success' => "Created Successfully", 'dashboard' => '1', 'redirect' => route('pages.index')]);
        }
    }

    private function rules($edit = null)
    {
        $x = [
            'name' => 'required|min:1|max:191',
            'body' => 'required|string',
            'avatar' => 'required|mimes:' . parent::allowExIamges(),
        ];
        if ($edit != null) {
            $x['avatar'] = 'nullable|mimes:' . parent::allowExIamges();
            $x['id'] = 'required|integer|min:1';
        }
        return $x;
    }

    public function get_data(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display  per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Pages::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Pages::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Pages::orderBy($columnName, $columnSortOrder)
            ->where('pages.name', 'like', '%' . $searchValue . '%')
            ->select('pages.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {

            $edit = route('pages.edit', ['id' => $record->id]);
            $name = $record->name;
            $icon = $record->avatar();
            $created_at = $record->created_at();
            $updated_at = $record->updated_at();
            $edit_title = 'Edit';
            $delete_title = 'Delete';
            $id = '#' . str_replace(' ','',strtolower($name)) .$record->id;

            $option = "<div class=\"d-flex\">
                    <div class='pr-1 mb-xl-0'><a style='margin-right: 5px;' class=\"btn btn-primary btn-sm\" href=\"$edit\"><i class='color_wi fa fa-edit'></i>$edit_title</a></div>
                      <div class='pr-1 mb-xl-0'><a class=\"btn_delete_current btn btn-danger btn-sm\" data-id='{$record->id}'><i class='color_wi fa fa-trash'></i>$delete_title</a></div>
                    </div>";


            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "icon" => "<img src='$icon' width='32' height='32'>",
                "created_at" => $created_at,
                "updated_at" => $updated_at,
                "option" => $option,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }

    function deleted(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        $pages = Pages::where('id', '=', $id)->first();
        if ($pages == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        $pages->delete();
        return response()->json(['error' => "Delete Successfully"]);
    }

    function details($id)
    {
        if ($id == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        $pages = Pages::where('id', '=', $id)->first();
        if ($pages == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        return response()->json(['success' => $pages]);
    }

}
