<?php

namespace App\Http\Controllers\Auth;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use function view;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class CustomerController extends Controller
{
    public function LoginForm()
    {
        return view('frontEnd.pages.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect('/')->with('msg', 'Successfully Log In !');
        }else{
            return redirect()->back()->with('email')->with('msg','wrong Email or Password !');
        }
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/')->with('msg','Successfully Log Out !');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        return view('frontEnd.pages.signup');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|min:11',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if($request->password_confirmation==$request->password){
            if( Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
            ])){
                return redirect('customer-login')->with('msg','Successfully Registration Now Log In with your email and Password!');
            }
        }
        return redirect('customer-create');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
