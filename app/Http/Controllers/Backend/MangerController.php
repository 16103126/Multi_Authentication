<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MangerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:manger');
    }
    
    public function index()
    {
        return view('backend.pages.manger');
    }
}
