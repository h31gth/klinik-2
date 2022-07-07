<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $response = Http::get('https://data.covid19.go.id/public/api/prov.json');
        $data = json_decode($response);
        // $data = json_encode($data);
        $daftar = Pendaftaran::count();
        $dokter = Dokter::count();
        $poli = Poliklinik::count();
        $pasien = Pasien::count();
        // dd($data);
        return view('admin.index',compact('daftar','pasien','poli','dokter','data'));
    }
}
