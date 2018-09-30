<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
    	// Blog
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();

    	return view('wc', compact('notices'));
    }

    public function notice(Request $request)
    {
    	$ntc = Notice::find($request->id);
    	$view = view("layouts.content",compact('ntc'))->render();
        return response()->json(['html'=>$view]);
    }

    public function developers()
    {
    	// Blog
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        
    	return view('frontEnd.developers', compact('notices'));
    }
}
