<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Poliklinik::orderBy('id','desc')->get();
        return view('admin.poliklinik.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.poliklinik.create');
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
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $image = $request->file('image');
        $nama_photo = date('YmdHis').$image->getClientOriginalName();
        $image->move('images/poliklinik', $nama_photo);
        $photo = 'images/poliklinik/' . $nama_photo;

        Poliklinik::create([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'image' => $photo
        ]);

        return redirect('admin/poliklinik')->with('message','Data Berhasil Di Tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function show(Poliklinik $poliklinik)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Poliklinik::findOrFail($id);
        return view('admin.poliklinik.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = Poliklinik::findOrFail($id);
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $image = $request->file('image');
        if ($image == "") {
            $data->update([
                'nama' => $nama,
                'deskripsi' => $deskripsi
            ]);
            return redirect('admin/poliklinik')->with('message', 'Data Berhasil Di Update');
        }else{
            File::delete(public_path($data->image));
            $nama_photo = date('YmdHis').$image->getClientOriginalName();
            $image->move('images/poliklinik', $nama_photo);
            $photo = 'images/poliklinik/' . $nama_photo;

            $data->update([
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'image' => $photo
            ]);
            return redirect('admin/poliklinik')->with('message', 'Data Berhasil Di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Poliklinik::findOrFail($id);
        $data2 = $data->image;
        $data->delete();
        File::delete(public_path($data2));
        return redirect('admin/poliklinik')->with('message', 'Data Berhasil Di Hapus');
    }

    public function tampilpoli()
    {
        $dokter = Dokter::select('dokter.*','poliklinik.nama AS poli')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->orderBy('dokter.id','desc')
        ->get();
        $response = Http::get('https://data.covid19.go.id/public/api/prov.json');
        $covid = json_decode($response);
        $data = Poliklinik::get();
        return view('landingpage.index',compact('data','dokter','covid'));
    }
}
