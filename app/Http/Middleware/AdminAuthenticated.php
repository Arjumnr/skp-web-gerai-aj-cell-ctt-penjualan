<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {

        if(!Auth::check()){
            return redirect('getLogin');
            // return 'apa';
        }

           //    simpan data user pada variabel $user
        $user = Auth::user();
        // return 'oke';
       //    jika user memiliki level sesuai pada kolom pada lanjutkan request
          if($user->level == $roles){
            return $next($request);
          }
          
       //    jika tidak memiliki akses maka kembalikan ke halaman getLogin
           return redirect('getLogin')->with('error','Maaf anda tidak memiliki akses');
        
    }
}
