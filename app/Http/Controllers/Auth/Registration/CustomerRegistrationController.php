<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registration.customer-registration');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'job_title' => 'required',
            'password' => 'required|min:5|max:12|unique:customers'
        ]);

        //Insert data into database
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->job_title = $request->job_title;
        $customer->password = Hash::make($request->password);
        $save = $customer->save();

        if($save){
            return back()->with('success', 'New Customer has been successfuly added to database');
        }else{
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}
