@extends('landingpage.layouts.main')

@section('content')

<div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/about-us.png);background-position:top center;background-size:contain;">
</div>

  <section class="py-8">
    <div class="container">
        <h1 class="text-gray-800 text-center mb-4">Contact</h1>
      <div class="row">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/dot-bg.png);background-position:bottom right;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="col-lg-6 z-index-2 mb-5"><img class="w-100" src="{{ asset('assets/img/gallery/appointment.png') }}" alt="..." /></div>
        <div class="col-lg-6 z-index-2">
          <form class="row g-3">
            <div class="col-md-6">
              <label class="visually-hidden" for="inputName">Name</label>
              <input class="form-control form-livedoc-control" id="inputName" type="text" placeholder="Name" />
            </div>
            <div class="col-md-6">
              <label class="visually-hidden" for="inputPhone">Phone</label>
              <input class="form-control form-livedoc-control" id="inputPhone" type="text" placeholder="Phone" />
            </div>
            <div class="col-md-12">
              <label class="form-label visually-hidden" for="inputEmail">Email</label>
              <input class="form-control form-livedoc-control" id="inputEmail" type="email" placeholder="Email" />
            </div>
            <div class="col-md-12">
              <label class="form-label visually-hidden" for="validationTextarea">Message</label>
              <textarea class="form-control form-livedoc-control" id="validationTextarea" placeholder="Message" style="height: 250px;"></textarea>
            </div>
            <div class="col-12">
              <div class="d-grid">
                <button class="btn btn-primary rounded-pill" type="submit">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
