<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();
            try {
                if ($request->ajax()) {
                    return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#basicModal" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit"> <i class="menu-icon tf-icons  bx bx-edit"></i></a>';
                            $btn =  $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"> <i class="menu-icon tf-icons  bx bx-trash"></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                return view('admin.users.index');
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
    }
    public function store(Request $request)
    {
        try {
            User::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'level' => $request->level,
                    'no_hp' => $request->no_hp,

                ]
            );
            return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $dataUser = User::find($id);
        return response()->json($dataUser);
    }


    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
