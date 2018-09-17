<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'required|image',
            'identity' => 'required|image',
            'reg_as' => 'required',
        ]);
    }

    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\User
    */
    protected function create(array $data)
    {
        $avatar = '';
        $identity = '';

        if($data['avatar']){
            $avatar = $data['avatar'];
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('public/uploads/avatar', $avatar_new_name);
            $avatar = $avatar_new_name;
        }

        if($data['identity']){
            $i = $data['identity'];
            $i_new_name = time() . $i->getClientOriginalName();
            $i->move('public/uploads/identity', $i_new_name);
            $identity = $i_new_name;
        }

        Session::flash('info', 'Your registration has been submitted. Please wait for verification :)');

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'reg_as' => $data['reg_as'],
            'avatar' => $avatar,
            'identity' => $identity,
        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
        ?: redirect('/');
    }
}
