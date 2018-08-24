<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use function view;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['except'=>['create','store']]);
    }

    public function index()
    {
       return view('backEnd.index');
    }


    public function create()
    {
      return view('backEnd.pages.admin_signup');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($request->password_confirmation==$request->password){
            if( Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ])){
                return redirect('admin')->with('msg','Successfully Registration Now Log In with your email and Password!');
            }
        }
        return redirect('admin-signup');

    }
}
