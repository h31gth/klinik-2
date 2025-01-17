@extends('landingpage.layouts.main')

@section('content')
<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size"
      style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <h1 class="mb-5 mt-3 text-gray-800 text-center">Daftar</h1>
        <div class="row d-flex justify-content-center">
            {{-- <div class="col-lg-3">
                <ul>
                    <li><a class="text-primary" href="">Poli Anak</a></li>
                </ul>
            </div> --}}
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-lg-4">
                    <div class="card mb-4">
                        <img src="{{ asset($item->image_poli) }}" class="card-img-top" width="150px" height="150px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Poliklinik :  {{ $item->poli }}</h5>
                            <h5 class="card-text">Dokter : {{ $item->dokter }}</h5>
                          </div>
                          <div class="card-body">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <form class="user" method="POST" action="{{ url('landingpage/pendaftaran') }}">
                                    @csrf
                                <input type="hidden" name="pasien" value="{{ $pasien->id }}">
                            <input type="hidden" name="jadwal_dokter" value="{{ $item->id }}">
                            <button type="submit" class="card-link btn btn-primary rounded-pill btn-sm">Daftar</button>
                        </form>
                            </div>
                          </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
</section>
@endsection