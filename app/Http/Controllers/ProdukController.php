<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $barang = Barang::all();

        return view('produk.index', compact('barang'));
    }
}
