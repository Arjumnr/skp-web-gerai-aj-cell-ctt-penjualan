<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin()
    { 
        // return 'cx';
        $user = Auth::user();
        // kondisi jika user nya ada 
        if($user){
            // jika user nya memiliki level admin
            if($user->level =='admin'){
                 // arahkan ke halaman admin ya :P
                return redirect('/admin');
            }
        }else{
            return view('login');
        }
    }

    public function postLogin(Request $request){
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            $user = Auth::user();
            if($user->level == 'admin'){
                // return 'okesi';
                return redirect('/admin');
            }

            if ($user->level == 'user') {
                return redirect('/');
            }
        }
        else{
            return redirect('/login');
        }
    }

    public function register()
    { 
        // return 'cx';
        // $user = Auth::user();
        // // kondisi jika user nya ada 
        // if($user){
        //     // jika user nya memiliki level admin
        //     if($user->level =='admin'){
        //          // arahkan ke halaman admin ya :P
        //         return redirect('/admin');
        //     }
        // }else{
            return view('register');
        // }
    }

    public function postRegister(Request $request){
        try {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->level = 'user';
            $user->no_hp = $request->no_hp;
            $user->save();
            return redirect('/login');
        } catch (\Throwable $th) {
            return dd($th);
        }
    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
