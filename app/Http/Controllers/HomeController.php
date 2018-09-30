<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Shelf;
use App\Category;
use App\IssueBook;
use App\BookManagement;
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
        //Admin
        $user = User::all();
        $books = BookManagement::all();
        $categories = Category::all();
        $shelves = Shelf::all();
        $bookIssued = IssueBook::where('status', 0)->get();
        $bookReturned = IssueBook::where('status', 1)->get();

        $issueBooks = IssueBook::where('user_id', Auth::user()->id)
        ->where('status', 0)
        ->orderBy('return_date','desc')
        ->get();

        return view('home')
        ->with('user_count', count($user))
        ->with('book_count', count($books))
        ->with('category_count', count($categories))
        ->with('shelf_count', count($shelves))
        ->with('issued_count', count($bookIssued))
        ->with('returned_count', count($bookReturned))
        ->with('issueBooks', $issueBooks);

    }
}
