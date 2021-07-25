<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registration.employee-registration');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'job_title' => 'required',
            'password' => 'required|min:5|max:12|unique:employees'
        ]);

        //Insert data into database
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->job_title = $request->job_title;
        $employee->password = Hash::make($request->password);
        $save = $employee->save();

        if($save){
            return back()->with('success', 'New Employee has been successfuly added to database');
        }else{
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}
