<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StrukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/login.login');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('login', 'index')->name('login');
});

Route::post('/login/proses', [LoginController::class, 'authenticate'])->name('login.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:admin']], function () {
        Route::resource('admin/menu-page', MenuController::class)->names([
            'index' => 'menu',]);

        // Dashboard
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Meja
        Route::get('/meja-page', [MejaController::class, 'index'])->name('meja');
        Route::post('/input/meja', [MejaController::class, 'store'])->name('add');
        Route::post('/update-status-meja', [MejaController::class, 'updateStatusMeja'])->name('update-status-meja');
        Route::get('/delete/no_meja/meja', [MejaController::class, 'destroy'])->name('delete');
        
        // user
        Route::get('/admin/user-page', [UserController::class, 'index'])->name('user');
        Route::post('/add/user', [UserController::class, 'store'])->name('add.user');
        Route::get('/delete/{id_user}/user', [UserController::class, 'destroy']);
        Route::get('/edit/{id_user}/user/', [UserController::class, 'edit']);
        Route::post('/update/{id_user}/user', [UserController::class, 'update']);

        // Menu
        Route::get('/admin/menu-page', [MenuController::class, 'index'])->name('menu');
        Route::view('/add/data-menu', 'admin.menu.add');
        Route::post('/input/data-menu', [MenuController::class, 'store']);
        Route::get('/delete/{id_menu}/menu', [MenuController::class, 'destroy']);
        Route::get('/edit/{id_menu}/menu', [MenuController::class, 'edit']);
        Route::post('/update/{id_menu}/menu', [MenuController::class, 'update']);

        // transaksi
        Route::get('/transaksi', [DetailPesananController::class, 'index'])->name('transaksi');
        Route::post('/add/detail', [DetailPesananController::class, 'store'])->name('tambahz');
        Route::get('/detail/transaksi', [DetailPesananController::class, 'destroy'])->name('delete_tran');
        Route::delete('/delete/{id_detail}/cart', [DetailPesananController::class, 'delete'])->name('delete.detail');

        // riwayat dan laporan
        Route::post('/checkout/pesanan', [PesananController::class, 'store'])->name('pesanan.checkout');
        Route::get('/riwayat/pesanan', [PesananController::class, 'index'])->name('riwayat');
        Route::get('/laporan/harian', [PesananController::class, 'report'])->name('report');
        Route::get('/laporan/bulanan', [PesananController::class, 'reportBulanan'])->name('bulanan');
        Route::get('/laporan/tahunan', [PesananController::class, 'reportTahunan'])->name('tahunan');
        Route::get('/delete/{id_pesanan}/pesanan', [PesananController::class, 'destroy'])->name('hapusRiwayat');
        Route::get('/riwayat/pesanan/filter', [PesananController::class, 'filter'])->name('filter');

        // print struk
        Route::get('/tespdf', [StrukController::class, 'index'])->name('struk');
    });

    Route::group(['middleware' => ['CekUserLogin:kasir']], function () {
        Route::resource('transaksi', DetailPesananController::class)->names(['index'
        => 'transaksi',]);

        // transaksi
        Route::view('/cek', 'kasir.transaksi')->name('cek');
        Route::get('/transaksi', [DetailPesananController::class, 'index'])->name('transaksi');
        Route::post('/add/detail', [DetailPesananController::class, 'store'])->name('tambahz');
        Route::get('/detail/transaksi', [DetailPesananController::class, 'destroy'])->name('delete_tran');
        Route::delete('/delete/{id_detail}/cart', [DetailPesananController::class, 'delete'])->name('delete.detail');

        // RIwayat
        Route::post('/checkout/pesanan', [PesananController::class, 'store'])->name('pesanan.checkout');
        Route::get('/riwayat/pesanan', [PesananController::class, 'index'])->name('riwayat');

        // print struk
        Route::get('/tespdf', [StrukController::class, 'index'])->name('struk');

        // Meja
        Route::get('/meja-page', [MejaController::class, 'index'])->name('meja');
        Route::post('/update-status-meja', [MejaController::class, 'updateStatusMeja'])->name('update-status-meja');
        Route::get('/delete/no_meja/meja', [MejaController::class, 'destroy'])->name('delete');
        
    });

    
});