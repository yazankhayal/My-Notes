<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index(){
        $item = Setting::first();
        return view('setting.index',compact('item'));
    }

    public function update(Request $request){
        $setting = Setting::first();
        $validation = Validator::make($request->all(), $this->rules($setting));
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        }
        else {
            if(!$setting){
                $setting = new Setting();
            }
            $setting->name = $request->name;
            $setting->body = $request->body;
            $setting->social = $request->social;
            if ($request->logo_black) {
                $setting->logo_black = parent::upload_fun($request->logo_black,'setting',1);
            }
            if ($request->logo_white) {
                $setting->logo_white = parent::upload_fun($request->logo_white,'setting',2);
            }
            $setting->save();
            return response()->json(['success' => "Updated Successfully", 'dashboard' => '1', 'redirect' => route('setting')]);
        }
    }

    private function rules($edit = null)
    {
        $x = [
            'name' => 'required|min:1|max:191',
            'body' => 'required',
            'social' => 'required',
            'logo_black' => 'required|mimes:' . parent::allowExIamges(),
            'logo_white' => 'required|mimes:' . parent::allowExIamges(),
        ];
        if ($edit != null) {
            $x['logo_black'] = 'nullable|mimes:' . parent::allowExIamges();
            $x['logo_white'] = 'nullable|mimes:' . parent::allowExIamges();
        }
        return $x;
    }


}
