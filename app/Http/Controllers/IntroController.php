<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntroController extends Controller
{
    public function index(){
        $item = Intro::first();
        return view('intro.index',compact('item'));
    }

    public function update(Request $request){
        $Intro = Intro::first();
        $validation = Validator::make($request->all(), $this->rules($Intro));
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        }
        else {
            if(!$Intro){
                $Intro = new Intro();
            }
            $Intro->name = $request->name;
            $Intro->body = $request->body;
            if ($request->avatar) {
                $Intro->avatar = parent::upload_fun($request->avatar,'setting',1);
            }
            $Intro->save();
            return response()->json(['success' => "Updated Successfully", 'dashboard' => '1', 'redirect' => route('intro')]);
        }
    }

    private function rules($edit = null)
    {
        $x = [
            'name' => 'required|min:1|max:191',
            'body' => 'required',
            'avatar' => 'nullable|mimes:' . parent::allowExIamges(),
        ];
        if ($edit != null) {
            $x['avatar'] = 'nullable|mimes:' . parent::allowExIamges();
        }
        return $x;
    }


}
