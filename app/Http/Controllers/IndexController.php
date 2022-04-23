<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use App\Models\Pages;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(){
        $intro = Intro::first();
        $services = Services::orderby('created_at','DESC')->get();
        return view('index',compact('intro','services'));
    }

    public function contact(Request $request){
        $validation = Validator::make($request->all(), $this->rules());
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()]);
        } else {

            $from_email = env('MAIL_USERNAME');

            $name = $request->name;
            $to_name = $request->name;
            $to_email = $request->email;

            $data = array('body' => $request->message,'name' => $request->name,'subject' => $request->subject, "email" => $request->email);

            Mail::send(['html'=>'emails.contact'], $data, function($message) use ($name,$to_name, $to_email,$from_email) {
                $message->to($to_email, $to_name)
                    ->subject('Hi,Iam '.$name);
                $message->from($from_email,'Hi,Iam '.$name);
            });

            return response()->json(['success' => "Send it Successfully"]);
        }
    }

    private function rules()
    {
        $x = [
            'name' => 'required|min:1|max:191|regex:/^[a-zA-Z0-9]/',
            'email' => 'required|min:1|email',
            'subject' => 'required|min:1|string|max:191|regex:/^[a-zA-Z0-9]/',
            'message' => 'required|min:1|max:350|regex:/^[a-zA-Z0-9]/',
        ];
        return $x;
    }

    public function page($id,$slug){
        $page = Pages::where('id',$id)->where('slug',$slug)->first();
        if($page){
            return view('page',compact('page'));
        }
        return  redirect()->back();
    }
}
