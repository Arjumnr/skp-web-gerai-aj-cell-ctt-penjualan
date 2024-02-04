<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login' , [App\Http\Controllers\AuthController::class, 'getLogin'])->name('login');
Route::post('/dologin' , [App\Http\Controllers\AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout' , [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// Route::get('/tes' , [App\Http\Controllers\IndexController::class, 'tes'])->name('tes');


Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['adminAuth:admin']], function () {
       Route::get('/' , [App\Http\Controllers\IndexController::class, 'index'])->name('index');
       Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
       Route::get('barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang.index');

    });
   
});

// Route::group(['middleware' => ['auth']], function () {

//     Route::group(['middleware' => ['admin:1']], function () {
//         Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//         Route::resource('users', UsersController::class);
//         Route::resource('jenis', JenisController::class);
//         Route::resource('antrian', AntrianAdminController::class);
//         Route::resource('barang', BarangController::class);
//         Route::resource('servis', ServisController::class);
//         Route::resource('penjualan', PenjualanController::class);
//         Route::resource('honor', HonorController::class);


            
//     });
// });
