<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pencatatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PencatatanController extends Controller
{
    public function index(Request $request){
        $data = Pencatatan::with('get_barang')->get();
        $barang = Barang::all();
            try {
                if ($request->ajax()) {
                    return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit"> <i class="menu-icon tf-icons  bx bx-edit"></i></a>';
                            $btn =   ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"> <i class="menu-icon tf-icons  bx bx-trash"></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                return view('admin.pencatatan.index', compact('barang'));
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
        public function store(Request $request)
        {
            try {
                Pencatatan::updateOrCreate(
                    ['id' => $request->data_id],
                    [
                        'barang_id' => $request->barang_id,
                        

                    ]
                );
                return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }

        public function edit($id)
        {
            $dataUser = Pencatatan::find($id);
            return response()->json($dataUser);
        }


        public function destroy($id)
        {
            try {
                Pencatatan::find($id)->delete();
                return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
}
