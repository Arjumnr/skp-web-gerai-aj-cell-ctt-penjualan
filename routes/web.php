<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserController;
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
Route::get('/regiter' , [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/dologin' , [App\Http\Controllers\AuthController::class, 'postLogin'])->name('postLogin');
Route::post('/do-register' , [App\Http\Controllers\AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/logout' , [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/' , [App\Http\Controllers\IndexController::class, 'indexUser'])->name('home');
Route::get('/produk' , [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::get('/keranjang' , [App\Http\Controllers\KeranjangController::class, 'index'])->name('keranjang');
Route::get('/add-keranjang/{id}' , [App\Http\Controllers\KeranjangController::class, 'add'])->name('addKeranjang');
Route::get('/del-keranjang/{id}' , [App\Http\Controllers\KeranjangController::class, 'delKeranjang'])->name('delKeranjang');
Route::post('/pesan' , [App\Http\Controllers\KeranjangController::class, 'pesan'])->name('pesan');
Route::post('/export' , [App\Http\Controllers\PencatatanController::class, 'export'])->name('export');


Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['adminAuth:admin']], function () {
       Route::get('/' , [IndexController::class, 'index'])->name('index');
       Route::resource('users', UserController::class);
       Route::resource('barang', BarangController::class);
       Route::resource('provider', ProviderController::class);
       Route::resource('pencatatan', PencatatanController::class);

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
