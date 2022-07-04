<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Pendaftaran;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $pasien = Pasien::get();
        $mytime = Carbon::now('Asia/Jakarta');
        $jadwal = JadwalDokter::select('jadwal_dokters.*','dokter.name AS dokter','poliklinik.nama AS poli')
        ->join('dokter','dokter.id','=','jadwal_dokters.dokter_id')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->where('hari',$mytime->isoFormat('dddd'))
        ->where('jam_mulai',"<", $mytime->isoFormat('H:m:s'))
        ->where('jam_selesai',">", $mytime->isoFormat('H:m:s'))
        ->get();
        return view('admin.pendaftaran.create',compact('pasien','jadwal'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_jadwal = $request->jadwal_dokter;
        $no_antrian = Pendaftaran::generateNoAntrian($id_jadwal,date('Y-m-d'));
        $no_pasien = $request->pasien;
        $users = Auth::id();
        Pendaftaran::create([
            'pasien_id' => $no_pasien,
            'jadwal_dokter_id' => $id_jadwal,
            'users_id' => $users,
            'tgl_pendaftaran' => date('Y-m-d'),
            'no_antrian' => $no_antrian,
            'status' => "Terdaftar"
        ]);
        return redirect('admin/pendaftaran')->with('message', 'Data Berhasil Di Tambahkan');
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
    public function edit($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $data->delete();
        return redirect('admin/pendaftaran')->with('message','Data Berhasil Dihapus');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update([
            'status' => 'Selesai'
        ]);
    return redirect('admin/pendaftaran')->with('message','Sudah Selesai!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $data->delete();
        return redirect('admin/pendaftaran')->with('message','Data Berhasil Dihapus!');
    }

    // Antrian Landing Page
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

    // Store Landing Page
    public function daftarpasien(Request $request){
        $id_jadwal = $request->jadwal_dokter;
        $no_antrian = Pendaftaran::generateNoAntrian($id_jadwal,date('Y-m-d'));
        $no_pasien = $request->pasien;
        $users = Auth::id();
        Pendaftaran::create([
            'pasien_id' => $no_pasien,
            'jadwal_dokter_id' => $id_jadwal,
            'users_id' => $users,
            'tgl_pendaftaran' => date('Y-m-d'),
            'no_antrian' => $no_antrian,
            'status' => "Terdaftar"
        ]);
        return redirect('landingpage/pendaftaran')->with('message', 'Pendaftaran Berhasil');
    }

    // Create Landing Page
    public function listdaftar()
    {
        $pasien = Pasien::select('pasien.*')
        ->where('user_id',Auth::id())
        ->first();

        $mytime = Carbon::now('Asia/Jakarta');

        $data = JadwalDokter::select('jadwal_dokters.*','dokter.name AS dokter','poliklinik.nama AS poli','poliklinik.image AS image_poli')
        ->join('dokter','dokter.id','=','jadwal_dokters.dokter_id')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->where('hari',$mytime->isoFormat('dddd'))
        ->where('jam_mulai',"<", $mytime->isoFormat('H:m:s'))
        ->where('jam_selesai',">", $mytime->isoFormat('H:m:s'))
        ->get();
        return view('landingpage.pendaftaran.create',compact('pasien','data'));   
    }

    // Index Landing Page
    public function daftartampil()
    {
        $data = Pendaftaran::select('pendaftaran.*','dokter.name AS dokter','poliklinik.nama AS poli','users.id AS id_user')
        ->join('jadwal_dokters','jadwal_dokters.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokters.dokter_id')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->join('pasien','pasien.id','=','pendaftaran.pasien_id')
        ->join('users','users.id','=','pasien.user_id')
        ->where('users.id',auth()->user()->id)
        ->get();
        return view('landingpage.pendaftaran.daftar',compact('data'));
    }

    // Delete Daftar landing page
    public function hapus_daftar($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $data->delete();
        return redirect('landingpage/pendaftaran/')->with('message','Data Berhasil Dihapus!');
    }

    public function showdaftar($id)
    {
        $data = Pendaftaran::select('pendaftaran.*','dokter.name AS dokter','poliklinik.nama AS poli','poliklinik.deskripsi','users.id AS id_user','pasien.id AS id_pasien','pasien.nama AS pasien','poliklinik.image AS image_poli','dokter.image AS image_dokter','jadwal_dokters.jam_mulai','jadwal_dokters.jam_selesai')
        ->join('jadwal_dokters','jadwal_dokters.id','=','pendaftaran.jadwal_dokter_id')
        ->join('dokter','dokter.id','=','jadwal_dokters.dokter_id')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->join('pasien','pasien.id','=','pendaftaran.pasien_id')
        ->join('users','users.id','=','pasien.user_id')
        ->where('pendaftaran.id',$id)
        ->where('users.id',auth()->user()->id)
        ->first();
        return view('landingpage.pendaftaran.show',compact('data'));
    }
}
