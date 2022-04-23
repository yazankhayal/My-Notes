<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ToDoListController extends Controller
{
    public function index(){
        return view('user/to_do_list.index');
    }

    public function create(){
        return view('user/to_do_list.create');
    }

    public function edit($id){
        $toDoList = ToDoList::where('id', '=', $id)->where('user_id',user()->id)->first();
        if ($toDoList) {
            return view('user/to_do_list.edit',compact('toDoList'));
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
                $item = ToDoList::where('id', '=', $request->id)->where('user_id',user()->id)->first();
            } else {
                $item = new ToDoList();
            }

            $item->name = $request->name;
            $item->user_id = user()->id;
            $item->body = $request->body;
            $item->type = $request->type;
            $item->status = $request->status;
            $item->date = $request->date;
            $item->save();

            return response()->json(['success' => "Created Successfully", 'dashboard' => '1', 'redirect' => route('to_do_list.index')]);
        }
    }

    private function rules($edit = null)
    {
        $types = listPriority();
        $typesRules = null;
        $typesRulesCount = 1;
        foreach ($types as $key => $value){
            $typesRulesCount++;
            if($typesRulesCount > count($types)){
                $typesRules = $typesRules . $key;
            }
            else{
                $typesRules = $key . "," . $typesRules;
            }
        }
        $status = listStatus();
        $statusRules = null;
        $statusRulesCount = 1;
        foreach ($status as $key => $value){
            $statusRulesCount++;
            if($statusRulesCount > count($status)){
                $statusRules = $statusRules . $key;
            }
            else{
                $statusRules = $key . "," . $statusRules;
            }
        }
        $x = [
            'name' => 'required|min:1|max:191',
            'date' => 'required|date',
            'body' => 'required|string',
            'status' => 'required|in:' . $statusRules,
            'type' => 'required|in:' . $typesRules,
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
        $totalRecords = ToDoList::select('count(*) as allcount')->where('user_id',user()->id)->count();
        $totalRecordswithFilter = ToDoList::select('count(*) as allcount')->where('user_id',user()->id)->where('name', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = ToDoList::orderBy($columnName, $columnSortOrder)
            ->where('user_id',user()->id)->where('to_do_list.name', 'like', '%' . $searchValue . '%')
            ->select('to_do_list.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {

            $edit = route('to_do_list.edit', ['id' => $record->id]);
            $name = $record->name;
            $date = $record->date;
            $tags = $record->Tags();
            $status = $record->Status();
            $type = $record->TypeBadge();
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
                "date" => $date,
                "tags" => $tags,
                "status" => $status,
                "type" => $type,
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
        $toDoList = ToDoList::where('id', '=', $id)->where('user_id',user()->id)->first();
        if ($toDoList == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        $toDoList->delete();
        return response()->json(['error' => "Delete Successfully"]);
    }

    function details($id)
    {
        if ($id == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        $toDoList = ToDoList::where('id', '=', $id)->where('user_id',user()->id)->first();
        if ($toDoList == null) {
            return response()->json(['error' => "Error Happen"]);
        }
        return response()->json(['success' => $toDoList]);
    }

}
