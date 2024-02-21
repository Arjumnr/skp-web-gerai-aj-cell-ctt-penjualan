<?php

namespace App\Http\Controllers;

use App\Exports\Export\UserExport;
use App\Models\Barang;
use App\Models\Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index()
    {

        $dataPencatatan = count(Pencatatan::all());
        $dataBarang = count(Barang::all());

        return view('dashboard', compact('dataPencatatan', 'dataBarang'));
        // if (Auth::check()) {
        //     return redirect('/admin');
        // } else {
        //     return view('login');
        // }
       
    }

    public function indexUser(){
        $barang = Barang::all();
        $barang=$barang->take(4);
        
        if (Auth::check()) {
            $cek = true;
          
        }else {
            $cek = false;
        }
        return view('index', compact('cek', 'barang'));
    } 

    public function keranjang(){
        return view('keranjang.index');
    }

    

    
}
