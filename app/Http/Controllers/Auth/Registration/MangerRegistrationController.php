<?php

namespace App\Http\Controllers\Auth\Registration;

use App\Models\Manger;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MangerRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registration.manger-registration');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:mangers',
            'job_title' => 'required',
            'password' => 'required|min:5|max:12|unique:mangers'
        ]);

        //Insert data into database
        $manger = new Manger;
        $manger->name = $request->name;
        $manger->email = $request->email;
        $manger->job_title = $request->job_title;
        $manger->password = Hash::make($request->password);
        $save = $manger->save();

        if($save){
            return back()->with('success', 'New Manger has been successfuly added to database');
        }else{
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}
