<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return dd('salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
