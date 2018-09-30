<?php

namespace App\Http\Controllers\blog;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('created_at', 'desc')->get();
        return view('admin.blog.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.notice.create');
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
            'title'=> 'required|min:5|max:100',
            'description' => 'required|min:55',
            'image' => 'image'
        ]);

        $notice = new Notice;
        $notice->title = $request->input('title');
        $notice->description = $request->input('description');

        if ($image = $request->file('image')) {
            $new_name = time(). '.' .$image->getClientOriginalExtension();
            $image->move('public/uploads/blog/notice/', $new_name);
            $notice['image']  = $new_name;
        }

        $notice->save();

        Session::flash('success','New notice published');

        return redirect()->route('notices.index');
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
        $notice = Notice::find($id);

        return view('admin.blog.notice.edit', compact('notice'));
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
            'title'=> 'required|min:5|max:100',
            'description' => 'required|min:55',
            'image' => 'image'
        ]);

        $notice = Notice::find($id);

        if ($request->has('title')) {
            $notice->title = $request->title;
        }
        if ($request->has('description')) {
            $notice->description = $request->description;
        }

        if ($image = $request->file('image')) {
            if ($notice->getOriginal('image')) {
                $path =  public_path(). '/uploads/blog/notice/' . $notice->getOriginal('image');
                unlink($path);
            }

            $new_name = time(). '.' .$image->getClientOriginalExtension();
            $image->move('public/uploads/blog/notice/', $new_name);
            $notice['image']  = $new_name;
        }

        $notice->save();
        Session::flash('success','Update successfully');

        return redirect()->route('notices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        // Restoring image path for delete
        if ($notice->getOriginal('image')) {
            $path =  public_path(). '/uploads/blog/notice/' . $notice->getOriginal('image');
            unlink($path);
        }

        $notice->delete();

        Session::flash('success','Notice Deleted');
        
        return redirect()->back();
    }
}
