<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Reminder;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notes = Notes::where('user_id',user()->id)
            ->where('status',1)
            ->orderby('created_at','DESC')
            ->limit(6)
            ->get();

        $reminderToday = Reminder::where('user_id',user()->id)
            ->whereDay('date', '=', date('d'))
            ->whereMonth('date', '=', date('m'))
            ->whereYear('date', '=', date('Y'))
            ->get();

        $toDoLists = ToDoList::where('user_id',user()->id)
            ->whereDay('date', '=', date('d'))
            ->whereMonth('date', '=', date('m'))
            ->whereYear('date', '=', date('Y'))
            ->get();
        return view('home',compact('notes','reminderToday','toDoLists'));
    }

    public function sign_out(){
        Auth::logout();
        return redirect()->route('index');
    }
}
