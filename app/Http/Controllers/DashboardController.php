<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $daftar = Pendaftaran::count();
        $dokter = Dokter::count();
        $poli = Poliklinik::count();
        $pasien = Pasien::count();
        return view('admin.index',compact('daftar','pasien','poli','dokter'));
    }
}
