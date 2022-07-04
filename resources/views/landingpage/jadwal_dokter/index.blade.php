@extends('landingpage.layouts.main')

@section('content')
<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size"
      style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <h1 class="text-center mb-4">JADWAL DOKTER</h1>
        <div class="row">
        @foreach ($data as $item)
        <div class="col-lg-3">
        <div class="card mt-4">
          <div class="card-body">
            <h5 class="card-title text-center">{{ $item->poli }}</h5>
            <h6 class="card-subtitle mb-2 text-center">{{ $item->dokter }}</h6>
            <div class="card-text">Hari : {{ $item->hari }}</div>
            <div class="card-text">Jam Mulai : {{ $item->jam_mulai }}</div>
            <div class="card-text">Jam Selesai : {{ $item->jam_selesai }}</div>
            {{-- <div class="d-flex justify-content-end"><a class="btn btn-primary rounded-pill btn-sm mt-3" href="">Detail</a></div> --}}
          </div>
        </div>
        </div>
        @endforeach
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-center">
      {{ $data->links() }}
    </div>
@endsection