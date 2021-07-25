<?php

namespace App\Http\Controllers\Auth\Login;

use Auth;
use App\Models\Manger;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MangerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:manger', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.login.manger-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Attemp to log the user
        if(Auth::guard('manger')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            
            //If successful then redirect to their intended location
            return redirect()->intended( route('manger.index') );
            
        }
       
        //If unsuccessful then redirect to the login with form
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(){
        Auth::guard('manger')->logout();
        return redirect('/');
    }
}
