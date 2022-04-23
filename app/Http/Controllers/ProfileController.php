<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function update(Request $request){
        $pass = false;
        if($request->password){
            $pass = true;
        }
        $validation = Validator::make($request->all(), $this->rules($pass));
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        }
        else {
            $user = user();
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return response()->json(['success' => "Updated Successfully", 'dashboard' => '1', 'redirect' => route('profile')]);
        }
    }

    private function rules($pass)
    {
        $x = [
            'name' => 'required|min:1|max:191',
            'email' => 'required|string|email|unique:users,email,' . user()->id,
        ];
        if ($pass) {
            $x['password'] = 'required|string|min:6|confirmed';
        }
        return $x;
    }


}
