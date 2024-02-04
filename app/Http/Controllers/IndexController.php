<?php

namespace App\Http\Controllers;

use App\Exports\Export\UserExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index()
    {

        return view('dashboard');
        // if (Auth::check()) {
        //     return redirect('/admin');
        // } else {
        //     return view('login');
        // }
       
    }

    

    
}
