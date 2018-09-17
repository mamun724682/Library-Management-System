<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $categories = Category::orderBy('created_at', 'desc')->get();
    
    return view('admin.category.index', compact('categories'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.category.create');
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
      'name' => 'required|min:3|max:100',
    ]);

    $category =new Category();

    $category->name = $request->name;

    if ($category->save()) {
      Session::flash('success', 'Successfully Category Created');
    }else {
      Session::flash('fail', 'Failed Category Created');
    }

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

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    return view('admin.category.edit')
    ->with('category', Category::find($id));
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
      'name' => 'required|min:3|max:100',
    ]);

    $category = Category::find($id);

    $category->name = $request->name;

    if ($category->save()) {
      Session::flash('success', 'Successfully Category Updated');
    }else {
      Session::flash('fail', 'Failed Category Updated');
    }

    return redirect()->route('category.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $category = Category::find($id);

    if ($category->delete()) {
      Session::flash('success', 'Successfully Category Deleted');
    }else {
      Session::flash('fail', 'Failed Category Deleted');
    }

    return redirect()->route('category.index');
  }
}
