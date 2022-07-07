@extends('landingpage.layouts.main')

@section('content')
    <section class="py-xxl-10 pb-0">
      <div class="bg-holder bg-size" style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="row min-vh-xl-100 min-vh-xxl-25">
          <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100"
              src="{!! asset('assets/img/home.png') !!}" alt="hero-header" /></div>
          <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
            <h1 class="fw-light font-base fs-6 fs-xxl-8">Sistem Informasi <strong>Klinik
              </strong></h1>
              <h3>Informasi COVID 19 Jawa Barat</h3>
              @foreach ($covid->list_data as $item)
              @if ($item->key == 'JAWA BARAT')
              <div>Total Kasus : {{ number_format($item->jumlah_kasus,0,',','.') }} orang</div>
              @endif
          @endforeach
              @foreach ($covid->list_data as $item)
              @if ($item->key == 'JAWA BARAT')
              <div>Total Sembuh : {{ number_format($item->jumlah_sembuh,0,',','.') }} orang</div>
              @endif
          @endforeach
              @foreach ($covid->list_data as $item)
              @if ($item->key == 'JAWA BARAT')
              <div>Total Kematian : {{ number_format($item->jumlah_meninggal,0,',','.') }} orang</div>
              @endif
          @endforeach
              <a class="btn btn-lg btn-primary rounded-pill mt-2" href="{{ url('landingpage/pendaftaran') }}" role="button">Lakukan Pendaftaran</a>
          </div>
        </div>
    </section>

    <section class="pb-0" id="about">

      <div class="container">
        <div class="row">
          <div class="col-12 py-3">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/about-us.png);background-position:top center;background-size:contain;">
            </div>
            <!--/.bg-holder-->

            <h1 class="text-center">TENTANG KAMI</h1>
          </div>
        </div>
      </div>
      <!-- end of .container-->

    </section>
    <section class="py-5">
      <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/about-bg.png);background-position:top center;background-size:contain;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 order-lg-1 mb-5 mb-lg-0"><img class="fit-cover rounded-circle w-100" src="{!! asset('images/ilustrasi/ilustration2.png') !!}" alt="..." /></div>
          <div class="col-md-6 text-center text-md-start">
            <h2 class="fw-bold mb-4">Aplikasi Pendaftaran Antrian Di klinik</h2>
            <p>Memberikan kemudahan dalam pendaftaran pasien, melihat antrian, melihat jadwal dokter dan melihat poliklinik yang ada di klinik ini.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-xxl-10 pb-0" id="home">
      <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:top left;background-size:auto;">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 pt-3">
            <!--/.bg-holder-->
            <h1 class="text-center">POLIKLINIK</h1>
          </div>
        </div>
      </div>
      <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->



    <section class="py-xxl-10 pb-0" id="home">
      <!--/.bg-holder-->

      <div class="container">
        <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
          @foreach ($data as $item)
          <div class="col-md-4 mb-md-5">
            <div class="card h-100 shadow card-span rounded-3"><img class="card-img-top rounded-top-3 img-thumbnail" src="{{ asset($item->image) }}" style="max-width: 280px; max-height:150px" alt="news" />
              <div class="card-body">
                <h5 class="font-base fs-lg-0 fs-xl-1 mt-2">{{ $item->nama }}</h5>
                <div class="div">{{ $item->deskripsi }}</div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="py-xxl-10 pb-0" id="home">
      <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:top left;background-size:auto;">
      </div>
    
        <div class="container">
              <h1 class="text-center">DOKTER</h1>
                    <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                      @foreach ($dokter as $item)
                      <div class="col-md-4 mb-md-5">
                        <div class="card card-span h-100 shadow">
                          <div class="card-body d-flex flex-column flex-center py-5"><img src="{{ asset($item->image) }}" style="max-width: 150px; max-height:150px" class="img-fluid" alt="..." />
                            <h5 class="mt-3">{{ $item->name }}</h5>
                            <p class="mb-0 fs-xxl-1 mb-1">{{ $item->poli }}</p>
                            <p class="text-600 mb-0 mb-2">{{ $item->alamat }}</p>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
        </div>
      </section>
      @include('landingpage.partials.banner')
      @endsection