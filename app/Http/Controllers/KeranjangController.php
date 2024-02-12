<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Pencatatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cek = true;
          
        }else {
            $cek = false;
            return view('login');
        }
        $keranjang = Keranjang::with('getBarang')->where('user_id', Auth::user()->id)->where('status', 0)->get();
        return view('keranjang.index', compact('keranjang', 'cek'));
    }

    public function add ($id) {
       try {
        $dataBarang = Barang::where('id', $id)->first();
        // return response()->json(['status' => 'error', 'barang_id' => $dataBarang]);

           $keranjang = new Keranjang();
           $keranjang->user_id = Auth::user()->id;
           $keranjang->barang_id = $dataBarang->id;
           $keranjang->total = $dataBarang->harga;
           $keranjang->jumlah = '1';
           $data = $keranjang->save();
           if ($data) {
                return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
           }
           return response()->json(['status' => 'error', 'message' => 'Produk gagal ditambahkan ke keranjang']);
       }
       catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
       }
    }

    public function delKeranjang($id) {
        try {
            $data = Keranjang::where('id', $id)->where('user_id', Auth::user()->id)->delete();
            if ($data) {
                return redirect()->back()->with('success', 'Produk di hapus dari keranjang');
            }
            return response()->json(['status' => 'error', 'message' => 'Produk gagal di hapus dari keranjang']);
        }
        catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function pesan(Request $req) {
        try{
            $data = $req->all();
           
           
            if (isset($data['check'])) {
                $totData = count($data['check']);
                // return response()->json(['data' => $data, 'totData' => $totData]);
                // return response()->json(['totData' => $totData]);

                if ($totData > 0) {
                    for ($i = 0; $i < $totData; $i++) {
                        $pencatatan = new Pencatatan();
                        $pencatatan->user_id = Auth::user()->id;
                        $pencatatan->barang_id = $data['check'][$i];
                        $pencatatan->total = strval($data['total']);
                        $pencatatan->jumlah = strval($data['jumlah'][$i]);
                        $pencatatan->save();


                        // update keranjang
                        $keranjang = Keranjang::where('user_id', Auth::user()->id)->where('status', 0)->where('barang_id', $data['check'][$i])->get();
                        // update(['status' => 1, 'total' => $data['total'], 'jumlah' => $data['jumlah'][$i]]);

                        //  ->update([
                        //     'status' => 1,
                        //     'total' => $data['total'],
                        //     'jumlah' => $data['jumlah'][$i]
                        // ]);




                    }
                    // $keranjang = Keranjang::where('user_id', Auth::user()->id)->where('status', 0)->get();
                    return response()->json(['keranjang' => $keranjang]);
                    

                    return response()->json(['status' => 'success', 'message' => 'Produk ditambahkan ke keranjang']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'No checkboxes are checked.']);
                }
            }

            return response()->json(['status' => 'error', 'message' => 'No data received.']);


        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
