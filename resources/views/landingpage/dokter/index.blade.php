@extends('landingpage.layouts.main')

@section('content')
<section class="py-xxl-10 pb-0" id="home">
  <div class="bg-holder bg-size"
    style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
  </div>
  <!--/.bg-holder-->

    <div class="container">
      <div class="row flex-center">
        <div class="col-xl-10 px-0">
          <h1 class="text-center">OUR DOCTORS</h1>
                <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                  @foreach ($data as $item)
                  <div class="col-md-4 mb-md-5">
                    <div class="card card-span h-100 shadow">
                      <div class="card-body d-flex flex-column flex-center py-5"><img src="{{ asset($item->image) }}" width="128" alt="..." />
                        <h5 class="mt-3">{{ $item->name }}</h5>
                        <p class="mb-0 fs-xxl-1 mb-1">{{ $item->poli }}</p>
                        <p class="text-600 mb-0 mb-2">{{ $item->alamat }}</p>
                        <div class="text-center">
                          <a href="{{ url('landingpage/dokter/detail/'.$item->id) }}" class="btn btn-outline-secondary rounded-pill">View Profile</a>
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