@extends('landingpage.layouts.main')

@section('content')
    <section class="py-xxl-10 pb-0" id="home">
      <div class="bg-holder bg-size"
        style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="row min-vh-xl-100 min-vh-xxl-25">
          <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100"
              src="{!! asset('assets/img/home.png') !!}" alt="hero-header" /></div>
          <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-6">
            <h1 class="fw-light font-base fs-6 fs-xxl-7">Sistem Informasi <strong>Klinik
              </strong></h1>
            <p class="fs-1 mb-3">Memberikan kemudahan dalam pendaftaran pasien, melihat jadwal dokter, melihat dokter kami dan melihat poliklinik yang ada di klinik ini.</p><a class="btn btn-lg btn-primary rounded-pill" href="#!" role="button">Lakukan Pendaftaran</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12 py-3">
            <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/bg-departments.png);background-position:top center;background-size:contain;">
            </div>
        <h1 class="text-center mt-5">OUR DEPARTMENTS</h1>
          </div>
        </div>
        <div class="row py-5 align-items-center justify-content-center justify-content-lg-evenly mt-4 mb-5">
          <div class="col-auto col-md-4 col-lg-auto text-xl-start">
            <div class="d-flex flex-column align-items-center">
              <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/neurology.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/neurology.svg" alt="..." />
                  <p class="fs-1 fs-xxl-2 text-center">Neurology</p>
                </a></div>
            </div>
          </div>
          <div class="col-auto col-md-4 col-lg-auto text-xl-start">
            <div class="d-flex flex-column align-items-center">
              <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/eye-care.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/eye-care.svg" alt="..." />
                  <p class="fs-1 fs-xxl-2 text-center">Eye care</p>
                </a></div>
            </div>
          </div>
          <div class="col-auto col-md-4 col-lg-auto text-xl-start">
            <div class="d-flex flex-column align-items-center">
              <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/cardiac.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/cardiac.svg" alt="..." />
                  <p class="fs-1 fs-xxl-2 text-center">Cardiac care</p>
                </a></div>
            </div>
          </div>
          <div class="col-auto col-md-4 col-lg-auto text-xl-start">
            <div class="d-flex flex-column align-items-center">
              <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/heart.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/heart.svg" alt="..." />
                  <p class="fs-1 fs-xxl-2 text-center">Heart care</p>
                </a></div>
            </div>
          </div>
          <div class="col-auto col-md-4 col-lg-auto text-xl-start">
            <div class="d-flex flex-column align-items-center">
              <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/osteoporosis.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/osteoporosis.svg" alt="..." />
                  <p class="fs-1 fs-xxl-2 text-center">Osteoporosis</p>
                </a></div>
            </div>
          </div>
          <div class="col-auto col-md-4 col-lg-auto text-xl-start">
            <div class="d-flex flex-column align-items-center">
              <div class="icon-box text-center"><a class="text-decoration-none" href="#!"><img class="mb-3 deparment-icon" src="assets/img/icons/ent.png" alt="..." /><img class="mb-3 deparment-icon-hover" src="assets/img/icons/ent.svg" alt="..." />
                  <p class="fs-1 fs-xxl-2 text-center">ENT</p>
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
      @endsection