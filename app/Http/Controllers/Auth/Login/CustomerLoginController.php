<?php

namespace App\Http\Controllers\Auth\Login;

use App\Models\Customer;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.login.customer-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Attemp to log the user
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            
            //If successful then redirect to their intended location
            return redirect()->intended( route('customer.index') );
            
        }
       
        //If unsuccessful then redirect to the login with form
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
