<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with('users',$users);
    }

    public function getUnapprovedUser()
    {
        $users = User::where('is_approved', 0)->get();
        return view('admin.user.index')->with('users',$users);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // VALIDATION
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->reg_as = $request->reg_as;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('public/uploads/avatar', $avatar_new_name);
            $user->avatar = $avatar_new_name;
        }

        if($request->hasFile('identity'))
        {
            $identity = $request->identity;
            $identity_new_name = time() . $identity->getClientOriginalName();
            $identity->move('public/uploads/identity', $identity_new_name);
            $user->identity = $identity_new_name;
        }

        $user->save();
        Session::flash('success','User Added Successfully');
        return redirect()->route('users.index');

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show')->with('user',$user);


    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit')->with('user',$user);
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
        // VALIDATION
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->reg_as = $request->reg_as;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = $user->avatar;
            $avatar->move('public/uploads/avatar', $avatar_new_name);
            $user->avatar = $avatar_new_name;
        }

        if($request->hasFile('identity'))
        {
            $identity = $request->identity;
            $identity_new_name = $user->identity;
            $identity->move('public/uploads/identity', $identity_new_name);
            $user->identity = $identity_new_name;
        }

        $user->save();
        Session::flash('success','User Update Successfully');
        return redirect()->route('users.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->id == Auth::user()->id) {
            Session::flash('fail','Don\'t Delete Yourself');
            return redirect()->back();
        }

        $user->delete();
        Session::flash('success','User Delete Successfully');
        return redirect()->route('users.index');
    }

    public function verify($user_id=0)
    {
        $user = User::find($user_id);
        $user->is_approved = 1;
        $user->save();
        Session::flash('success','Verified');
        return redirect()->back();
    }
    public function unverify($user_id=0)
    {
        $user = User::find($user_id);
        $user->is_approved = 0;
        $user->save();
        Session::flash('success','Unverified');
        return redirect()->back();
    }
    public function admin($user_id=0)
    {
        $user = User::find($user_id);
        $user->is_admin = 1;
        $user->save();
        return redirect()->back();
    }
    public function general($user_id=0)
    {
        $user = User::find($user_id);
        $user->is_admin = 0;
        $user->save();
        return redirect()->back();
    }

}
