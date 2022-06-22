@extends('landingpage.layouts.main')

@section('content')
<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size"
      style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <h1 class="text-center mb-4">POLIKLINIK</h1>
        <div class="carousel slide" id="carouselExampleDark" data-bs-ride="carousel"><a class="carousel-control-prev carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></a>
            <div class="carousel-inner">
                @foreach ($data as $item)
                <div class="carousel-item {{ ($item->id == 1)?'active':'' }}" data-bs-interval="10000">
                    <div class="row align-items-center mb-5 mt-2">
                    <div class="col-md-6 order-lg-1 mb-5 mb-lg-0"><img class="fit-cover rounded-circle w-100" src="{{ asset($item->image) }}" alt="..." width="500px" height="450px" /></div>
                    <div class="col-md-6 text-center text-md-start">
                        <h2 class="fw-bold mb-4 text-center">{{ $item->nama }}</h2>
                        <p class="text-center">{{ $item->deskripsi }}</p>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection