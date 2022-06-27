<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendaftaran::select('pendaftaran.*','dokter.name AS dokter','pasien.nama AS pasien')
        ->join('jadwal_dokters','jadwal_dokters.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokters.dokter_id')
        ->join('pasien','pasien.id','=','pendaftaran.pasien_id')
        ->get();
        return view('admin.pendaftaran.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }

    public function antrian(){
        $data = Pendaftaran::select('pendaftaran.id AS id','jadwal_dokters.jam_mulai AS jam_mulai','jadwal_dokters.jam_selesai AS jam_selesai','dokter.name AS dokter','pendaftaran.no_antrian AS no_antrian','poliklinik.id AS id_poli','poliklinik.nama AS nama_poli','dokter.poli_id','pendaftaran.tgl_pendaftaran AS tgl_pendaftaran','jadwal_dokters.hari AS hari','pendaftaran.status AS status')
        ->join('jadwal_dokters','jadwal_dokters.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokters.dokter_id')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->where('pendaftaran.status','Terdaftar')
        ->where('pendaftaran.tgl_pendaftaran',date('Y-m-d'))
        ->get();
        
        return view('landingpage.pendaftaran.antrian',compact('data'));
    }
}
