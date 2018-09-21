<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Shelf;
use App\BookManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Session;

class ShelvesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $shelves = Shelf::orderBy('created_at', 'desc')->get();

      return view('admin.shelf.index', compact('shelves'));
    }

    public function shelf_books($id)
    {
        $books = BookManagement::where('shelf_id', $id)->get();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.shelf.create');
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
          'name'=> 'required|min:3|max:20',

        ]);

        $shelf = new Shelf;

        $shelf->name = $request->name;

        if ($shelf->save()) {
          Session::flash('success','Shelf created successfully');
        }else {
          Session::flash('fail', 'Shelf created failed');
        };

        return redirect()->back();
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
        return view('admin.shelf.edit')
              ->with('shelf', Shelf::find($id));
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
        $this->validate($request, [
          'name' =>'required|min:3|max:10'
        ]);


        $shelf = Shelf::find($id);
        $shelf->name = $request->name;


        if ($shelf->save()) {
          Session::flash('success','Update Successfully');
        }else {
          Session::flash('fail','Update Failed');

        }
          return redirect()->route('shelves.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelf = Shelf::find($id);

        if ($shelf->delete()) {
          Session::flash('success','Deleted successfully');
        }else {
          Session::flash('fail','Deleted failed');
        }
        return redirect()->back();
    }
}
