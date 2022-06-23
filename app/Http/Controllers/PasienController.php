<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pasien::orderBy('id','desc')->get();
        return view('admin.pasien.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pasien.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'HP' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $nama = $request->nama;
        $alamat = $request->alamat;
        $HP = $request->HP;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;
        $password = $request->password;

        $userSaved = User::create([
                'name' => $nama,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

        if ($userSaved) {
            $userSaved->assignRole(2);
            Pasien::create([
                'nama' => $nama,
                'alamat' => $alamat,
                'HP' => $HP,
                'jk' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $userSaved->id
            ]);
        }
        return redirect('admin/pasien')->with('message', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);
        return view('admin.pasien.edit',compact('pasien','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'HP' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);
        //
        $nama = $request->nama;
        $alamat = $request->alamat;
        $HP = $request->HP;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;
        $password = $request->password;


        $userSaved = $user->update([
                'name' => $nama,
                'email' => $email,
                'password' => Hash::make($password)
            ]);

        if ($userSaved) {
            $pasien->update([
                'nama' => $nama,
                'alamat' => $alamat,
                'HP' => $HP,
                'jk' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $user->id
            ]);
        }
        return redirect('admin/pasien')->with('message', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);

        $pasien->delete();
        if ($pasien) {
            $user->delete();
            return redirect('admin/pasien')->with('message', 'Data Berhasil Di Hapus');
        }
    }

    public function createpasien(Request $request){
        //
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'HP' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $nama = $request->nama;
        $alamat = $request->alamat;
        $HP = $request->HP;
        $tgl_lahir = $request->tgl_lahir;
        $jk = $request->jk;
        $email = $request->email;
        $password = $request->password;

        $userSaved = User::create([
                'name' => $nama,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

        if ($userSaved) {
            $userSaved->assignRole(2);
            Pasien::create([
                'nama' => $nama,
                'alamat' => $alamat,
                'HP' => $HP,
                'jk' => $jk,
                'tgl_lahir' => $tgl_lahir,
                'user_id' => $userSaved->id
            ]);
        }
        return redirect('login')->with('message', 'Registrasi Berhasil');
    }
}
