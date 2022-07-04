<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/', [PoliklinikController::class, 'tampilpoli'], function () {
    return view('landingpage/index');
})->name('home');

Route::get('/landingpage/jadwal_dokter', [JadwalDokterController::class, 'tampiljadwal']);

Route::get('/landingpage/antrian',[PendaftaranController::class, 'antrian']);

Route::post('/auth/register', [PasienController::class,'createpasien']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/landingpage/pendaftaran',[PendaftaranController::class,'daftartampil']);
    Route::get('/landingpage/pendaftaran/show/{id}',[PendaftaranController::class,'showdaftar']);
    Route::get('/landingpage/pendaftaran/create',[PendaftaranController::class,'listdaftar']);
    Route::post('/landingpage/pendaftaran',[PendaftaranController::class,'daftarpasien']);
    Route::delete('/landingpage/pendaftaran/{id}',[PendaftaranController::class, 'hapus_daftar']);
});

Route::get('/logout',[LoginController::class,'logout']);

Route::group(['middleware' => ['role:Admin|Pegawai']],function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::resource('/dokter', DokterController::class);
        Route::resource('/poliklinik', PoliklinikController::class);
        Route::resource('/jadwal_dokter',JadwalDokterController::class);
        Route::resource('/pasien', PasienController::class);
        Route::resource('/pendaftaran', PendaftaranController::class);
    });
});

Route::resource('/admin/user', UserController::class)->middleware('role:Admin');
Route::resource('/admin/role', RoleController::class)->middleware('role:Admin');
