<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\IssueBook;
use App\BookManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {

        return view('admin.issue.issue')
                ->with('issue_books', IssueBook::orderBy('issue_date','desc')->get());
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'issue_date'=>'required',
            'user_id'=>'required',
            'book_id'=>'required',
            'return_date' => 'required|date'
        ]);
        $check = IssueBook::where('book_id',$request->book_id)->where('user_id',$request->user_id)->where('status',0)->count();

        if ($check) {

            Session::flash('fail','Book is already issued by this user');
            return redirect()->route('books.index');

        }

        $issue = new IssueBook;
        $issue->user_id = $request->user_id;
        $issue->book_id = $request->book_id;
        $issue->return_date = $request->return_date;
        $issue->issue_date = $request->issue_date;

        if ($issue->save()) {
            Session::flash('success','Book is issued');
        }
        return redirect()->route('books.index');




    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
    public function issue($id)
    {
        $book = BookManagement::findOrFail($id);

        return view('admin.books.issue', compact('book'));
    }

    public function book_returned($id)
    {
        $book_returned = IssueBook::find($id);
        $book_returned->status = 1;
        if ($book_returned->save()) {
            Session::flash('success','Returned');
        }
        return redirect()->back();
    }
    public function book_pending($id)
    {
        $book_pending = IssueBook::find($id);
        $book_pending->status = 0;
        if ($book_pending->save()) {
            Session::flash('fail','Pending');
        }
        return redirect()->back();
    }

}
