@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <form class="user" method="POST" action="{{ url('admin/pendaftaran') }}">
        @csrf
        <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Tambah Data Pendaftaran</h3>
            <div class="form-group">
                <label for="">Pasien</label>
                <select class="form-control text-center" name="pasien">
                    @foreach($pasien as $p)
                    @if(old('pasien') == $p->id)
                    <option value="{{ $p->id }}" selected>{{ $p->nama }}</option>   
                    @else
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endif
                    @endforeach
                  </select>
            </div>
        </div>
        <div class="col-lg-6">
            <br><br>
            <div class="form-group">
                <label for="">Jadwal Dokter</label>
                <select class="form-control text-center" name="jadwal_dokter">
                    @foreach($jadwal as $j)
                    @if(old('jadwal') == $j->id)
                    <option value="{{ $j->id }}" selected>{{ $j->dokter }} [{{ $j->jam_mulai }} - {{ $j->jam_selesai }}]</option>   
                    @else
                    <option value="{{ $j->id }}">{{ $j->dokter }} [{{ $j->jam_mulai }} - {{ $j->jam_selesai }}]</option>  
                    @endif
                    @endforeach
                  </select>
            </div>
        </div>
        <div class="form-group"><button type="submit" class="btn btn-primary btn-user px-5">Tambah</button></div>
        </div>
    </form>
</div>
@endsection