@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <form class="user" method="POST" enctype="multipart/form-data" action="{{ url('admin/jadwal_dokter') }}">
        @csrf
        <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Tambah Data Jadwal Dokter</h3>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Hari" name="hari">
        </div>
        <div class="form-group">
            <label for="">Dokter</label>
            <select class="form-control text-center" name="dokter">
                @foreach($dokter as $d)
                @if(old('dokter') == $d->id)
                <option value="{{ $d->id }}" selected>{{ $d->name }}</option>   
                @else
                <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endif
                @endforeach
              </select>
        </div>
        <div class="form-group">
            <label for="">Jam Mulai</label>
            <input type="time" class="form-control" name="jam_mulai">
        </div>
        <div class="form-group">
            <label for="">Jam Selesai</label>
            <input type="time" class="form-control" name="jam_selesai">
        </div>
        <div class="form-group"><button type="submit" class="btn btn-primary btn-user px-5">Tambah</button></div>
        </div>
        </div>
    </form>
</div>
@endsection