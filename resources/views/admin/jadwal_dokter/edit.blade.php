@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <form class="user" method="POST" enctype="multipart/form-data" action="{{ url('admin/jadwal_dokter/'.$data->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Edit Data Jadwal Dokter</h3>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Hari" name="hari" value="{{ $data->hari }}">
        </div>
        <div class="form-group">
            <label for="">Dokter</label>
            <select class="form-control text-center" name="dokter">
                @foreach($dokter as $d)
                @if(old('dokter',$data->dokter_id) == $d->id)
                <option value="{{ $d->id }}" selected>{{ $d->name }}</option>   
                @else
                <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endif
                @endforeach
              </select>
        </div>
        <div class="form-group">
            <label for="">Jam Mulai</label>
            <input type="time" class="form-control" name="jam_mulai" value="{{ $data->jam_mulai }}">
        </div>
        <div class="form-group">
            <label for="">Jam Selesai</label>
            <input type="time" class="form-control" name="jam_selesai" value="{{ $data->jam_selesai }}">
        </div>
        <div class="form-group"><button type="submit" class="btn btn-primary">Edit</button></div>
        </div>
        </div>
    </form>
</div>
@endsection