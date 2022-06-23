<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PoliklinikController;
use App\Models\JadwalDokter;
use App\Models\Poliklinik;

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
    return view('landingpage/index');
})->name('home');

Route::get('/landingpage/dokter', [DokterController::class, 'tampildokter']);

Route::get('/landingpage/poliklinik', [PoliklinikController::class, 'tampilpoli']);

Route::get('/landingpage/jadwal_dokter', [JadwalDokterController::class, 'tampiljadwal']);

Route::post('/auth/register', [PasienController::class,'createpasien']);
Auth::routes();

Route::get('/logout',[LoginController::class,'logout']);

Route::group(['middleware' => ['role:Admin']],function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin/index');
        })->name('dashboard');

        Route::resource('/dokter', DokterController::class);
        Route::resource('/poliklinik', PoliklinikController::class);
        Route::resource('/jadwal_dokter',JadwalDokterController::class);
        Route::resource('/pasien', PasienController::class);
        Route::resource('/pendaftaran', PendaftaranController::class);
    });
});
