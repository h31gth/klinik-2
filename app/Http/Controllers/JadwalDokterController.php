<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use App\Models\Dokter;

class JadwalDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JadwalDokter::orderBy('id','desc')->get();
        return view('admin.jadwal_dokter.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal_dokter.create',[
            'dokter' => Dokter::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dokter' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        $dokter = $request->dokter;
        $hari = $request->hari;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        JadwalDokter::create([
            'dokter_id' => $dokter,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        ]);

        return redirect('admin/jadwal_dokter')->with('message','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalDokter $jadwalDokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JadwalDokter::findOrFail($id);
        return view('admin.jadwal_dokter.edit',compact('data'),[
            'dokter' => Dokter::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'dokter' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        $jadwal_dokter = JadwalDokter::findOrFail($id);
        $dokter = $request->dokter;
        $hari = $request->hari;
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        $jadwal_dokter->update([
            'dokter_id' => $dokter,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai
        ]);
        return redirect('admin/jadwal_dokter')->with('message', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalDokter  $jadwalDokter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JadwalDokter::findOrFail($id);
        $data->delete();
        return redirect('admin/jadwal_dokter')->with('message', 'Data Berhasil Di Hapus');
    }

    public function tampiljadwal()
    {
        $data = JadwalDokter::select('jadwal_dokters.*','dokter.name AS dokter','poliklinik.nama AS poli')
        ->join('dokter','dokter.id','=','jadwal_dokters.dokter_id')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->get();
        return view('landingpage.jadwal_dokter.index',compact('data'));
    }
}
