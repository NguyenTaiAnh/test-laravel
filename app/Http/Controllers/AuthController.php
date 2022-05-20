<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        // User::where('name',$request->name)->first();

        if (auth()->attempt($credentials)) {

            return redirect()->route('home');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
 
        User::create([
            'name' => trim($request->input('name')),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('success', 'Your account is created');
       
        return redirect()->route('auth.login');
    }

    public function logout(){
        \Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }
}
