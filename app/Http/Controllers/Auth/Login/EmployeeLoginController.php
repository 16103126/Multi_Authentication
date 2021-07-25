<?php

namespace App\Http\Controllers\Auth\Login;

use Auth;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.login.employee-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Attemp to log the user
        if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            
            //If successful then redirect to their intended location
            return redirect()->intended( route('employee.index') );
            
        }
       
        //If unsuccessful then redirect to the login with form
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(){
        Auth::guard('employee')->logout();
        return redirect('/');
    }
}
