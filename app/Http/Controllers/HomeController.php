<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\IssueBook;
use Illuminate\Http\Request;

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
    * @return \Illuminate\Http\Response
    */
    public function index()
    {


        $user = User::all();
        $issueBooks = IssueBook::where('user_id', Auth::user()->id)
        ->where('status', 0)
        ->orderBy('return_date','desc')
        ->get();

        return view('home')
        ->with('user_count', count($user))
        ->with('issueBooks', $issueBooks);


    }
}
