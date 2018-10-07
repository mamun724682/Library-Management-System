<?php

namespace App\Http\Controllers\Admin;
use App\SubCategory;
use Session;
use App\User;
use App\Shelf;
use App\Category;
use App\BookManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksManagementController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.books.index')
        ->with('books', BookManagement::all());
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $category = Category::all();
        $shelf = Shelf::all();
        $abcd = SubCategory::orderBy('name', 'asc')->get();
        if ($category->count() == 0 || $shelf->count() == 0) {
            Session::flash('fail','You must have some categories and shelfs before attempting Add a Book');
            return redirect()->back();
        }
        return view('admin.books.create')
        ->with('categories',$category)
        ->with('abcd', $abcd)
        ->with('shelves',$shelf);
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
            'title' => 'required|min:2',
            'author' => 'required|min:2',
            'edition' => 'required|min:2',
            'session' => 'required|min:2',
            'category_id' => 'required',
            'page' => 'required',
            'publisher' => 'required|min:2',
            'language' => 'required|min:2',
            'isbn' => 'required|min:2',
            'purchase_date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'shelf_id' => 'required',
        ]);

        $book = new BookManagement();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->edition = $request->edition;
        $book->session = $request->session;
        $book->category_id = $request->category_id;
        $book->sub_category_id = $request->sub_category_id;
        $book->page = $request->page;
        $book->publisher = $request->publisher;
        $book->language = $request->language;
        $book->isbn = $request->isbn;
        $book->purchase_date = $request->purchase_date;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->shelf_id = $request->shelf_id;

        if ($image = $request->file('image')) {
            $new_name = time(). '.' .$image->getClientOriginalExtension();
            $image->move('public/uploads/bookImages/', $new_name);
            $book['image']  = $new_name;
        }
        $book->save();

        Session::flash('success','Book Added Successfully');

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
        return view('admin.books.show')
        ->with('shelves', Shelf::all())
        ->with('categories', Category::all())
        ->with('book', BookManagement::find($id));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        return view('admin.books.edit')
        ->with('shelves', Shelf::all())
        ->with('categories', Category::all())
        ->with('sub_category', SubCategory::all())
        ->with('book', BookManagement::find($id));
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
            'title' => 'required|min:2',
            'author' => 'required|min:2',
            'edition' => 'required|min:2',
            'session' => 'required|min:2',
            'category_id' => 'required',
            'page' => 'required',
            'publisher' => 'required|min:2',
            'language' => 'required|min:2',
            'isbn' => 'required|min:2',
            'purchase_date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'shelf_id' => 'required',
        ]);

        $book = BookManagement::find($id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->edition = $request->edition;
        $book->session = $request->session;
        $book->category_id = $request->category_id;
        $book->sub_category_id = $request->sub_category_id;
        $book->page = $request->page;
        $book->publisher = $request->publisher;
        $book->language = $request->language;
        $book->isbn = $request->isbn;
        $book->purchase_date = $request->purchase_date;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->shelf_id = $request->shelf_id;

        if ($image = $request->file('image')) {
            $new_name = time(). '.' .$image->getClientOriginalExtension();
            $image->move('public/uploads/bookImages/', $new_name);
            $book['image']  = $new_name;
        }

        $book->save();

        Session::flash('success','Book Update Successfully');

        return redirect()->route('books.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $book = BookManagement::find($id);
        // Restoring image path for delete
        $path =  public_path(). '/uploads/bookImages/' . $book->getOriginal('image');
        unlink($path);
        $book->delete();

        Session::flash('success','Book Deleted Successfully');


        return redirect()->back();
    }


    // public function user(Request $request)
    // {
    //     $email =
    // }

    public function check(Request $request)
    {
        if ($request->get('email')) {

            $email = $request->get('email');
            // $data = DB::table('users')->where('email',$email);
            $data = User::where('email',$email)->first()->toArray();
            if ($data) {
                return $data;
            }else {
                echo 'not_unique';
            }
        }
    }
}
