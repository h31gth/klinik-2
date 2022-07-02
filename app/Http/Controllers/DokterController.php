<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Support\Facades\File;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Dokter::orderBy('id', 'desc')->get();
        $data = Dokter::select('dokter.*','poliklinik.nama AS poli')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->orderBy('dokter.id','desc')
        ->get();
        return view('admin.dokter.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dokter.create',[
            'poliklinik' => Poliklinik::all()
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
            'name' => 'required|max:255',
            'HP' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'poliklinik' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $name = $request->name;
        $no_hp = $request->HP;
        $alamat = $request->alamat;
        $jk = $request->jk;
        $poliklinik = $request->poliklinik;
        $image = $request->file('image');
        $nama_photo = date('YmdHis').$image->getClientOriginalName();
        $image->move('images/dokter', $nama_photo);
        $photo = 'images/dokter/' . $nama_photo;

        Dokter::create([
            'poli_id' => $poliklinik,
            'name' => $name,
            'HP' => $no_hp,
            'alamat' => $alamat,
            'jk' => $jk,
            'image' => $photo
        ]);

        return redirect('admin/dokter')->with('message','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dokter::findOrFail($id);
        return view('admin.dokter.edit',compact('data'),[
            'poliklinik' => Poliklinik::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'HP' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'poliklinik' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
                $dokter = Dokter::findOrFail($id);
                $poliklinik = $request->poliklinik;
                $name = $request->name;
                $no_hp = $request->HP;
                $alamat = $request->alamat;
                $jk = $request->jk;
                $image = $request->file('image');
        
                if ($image == "") {
                    $dokter->update([
                        'poli_id' => $poliklinik,
                        'name' => $name,
                        'HP' => $no_hp,
                        'alamat' => $alamat,
                        'jk' => $jk
                    ]);
                    return redirect('admin/dokter')->with('message', 'Data Berhasil Di Update');
                }else{
                    File::delete(public_path($dokter->image));
                    $nama_photo = date('YmdHis') . $image->getClientOriginalName();
                    $image->move('images/dokter', $nama_photo);
                    $photo = 'images/dokter/' . $nama_photo;
        
                    $dokter->update([
                        'poli_id' => $poliklinik,
                        'name' => $name,
                        'HP' => $no_hp,
                        'alamat' => $alamat,
                        'jk' => $jk,
                        'image' => $photo
                    ]);
                    return redirect('admin/dokter')->with('message', 'Data Berhasil Di Update');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dokter::findOrFail($id);
        File::delete(public_path($data->image));
        $data->delete();
        return redirect('admin/dokter')->with('message', 'Data Berhasil Di Hapus');
    }

    public function tampildokter()
    {
        $data = Dokter::select('dokter.*','poliklinik.nama AS poli')
        ->join('poliklinik','poliklinik.id','=','dokter.poli_id')
        ->orderBy('dokter.id','desc')
        ->get();
        return view('landingpage.dokter.index', compact('data'));
    }
}
