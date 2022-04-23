<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function index(){
        return view('services.index');
    }

    public function create(){
        return view('services.create');
    }

    public function edit($id){
        $services = Services::where('id', '=', $id)->first();
        if ($services) {
            return view('services.edit',compact('services'));
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
                $item = Services::where('id', '=', $request->id)->first();
            } else {
                $item = new Services();
            }

            $item->name = $request->name;
            $item->body = $request->body;
            $item->icon = $request->icon;
            $item->save();

            return response()->json(['success' => "Created Successfully", 'dashboard' => '1', 'redirect' => route('services.index')]);
        }
    }

    private function rules($edit = null)
    {
        $x = [
            'name' => 'required|min:1|max:191',
            'body' => 'required|string',
            'icon' => 'required|string',
        ];
        if ($edit != null) {
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
        $totalRecords = Services::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Services::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Services::orderBy($columnName, $columnSortOrder)
            ->where('services.name', 'like', '%' . $searchValue . '%')
            ->select('services.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {

            $edit = route('services.edit', ['id' => $record->id]);
            $name = $record->name;
            $icon = $record->icon;
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
                "icon" => $icon,
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
        $services = Services::where('id', '=', $id)->first();
        if ($services == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        $services->delete();
        return response()->json(['error' => "Delete Successfully"]);
    }

    function details($id)
    {
        if ($id == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        $services = Services::where('id', '=', $id)->first();
        if ($services == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        return response()->json(['success' => $services]);
    }

}
