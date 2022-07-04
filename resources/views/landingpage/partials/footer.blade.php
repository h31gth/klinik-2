<section class="py-0 bg-secondary">
  <div class="bg-holder opacity-25" style="background-image:url({!! asset('assets/assets/img/gallery/dot-bg.png') !!});background-position:top left;margin-top:-3.125rem;background-size:auto;">
  </div>
  <!--/.bg-holder-->
  <div class="container">
    <div class="row pt-8">
      <div class="col-12 col-sm-12 col-lg-6 mb-4 order-0 order-sm-0"><img class="img-fluid" width="150px" src="{{ asset('images/Logo.png') }}" alt="">
        <p class="text-light">Klinik <br />telehealth company.</p>
      </div>
      <div class="col-6 col-sm-4 col-lg-2 mb-3 order-2 order-sm-1">
      </div>
      <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
        <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Membership</h5>
        <ul class="list-unstyled mb-md-4 mb-lg-0">
          <li class="lh-lg"><a class="footer-link" href="{{ url('/register') }}">Registrasi Akun</a></li>
          <li class="lh-lg"><a class="footer-link" href="{{ url('landingpage/pendaftaran') }}">Pendaftaran Antrian</a></li>
        </ul>
      </div>
      <div class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
        <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Informasi</h5>
        <ul class="list-unstyled mb-md-4 mb-lg-0">
          <li class="lh-lg"><a class="footer-link" href="{{ url('landingpage/jadwal_dokter') }}">Jadwal Dokter</a></li>
          <li class="lh-lg"><a class="footer-link" href="{{ url('landingpage/antrian') }}">Antrian</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ============================================-->
  <!-- <section> begin ============================-->
  <section class="py-0 bg-primary">

    <div class="container">
      <div class="row justify-content-md-between justify-content-evenly py-4">
        <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
          <p class="fs--1 my-2 fw-bold text-200">All rights Reserved &copy; Kelompok 2, 2022</p>
        </div>
        <div class="col-12 col-sm-8 col-md-6">
          <p class="fs--1 my-2 text-center text-md-end text-200"> Made with&nbsp;
            <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#F95C19" viewBox="0 0 16 16">
              <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
            </svg>&nbsp;by&nbsp;<a class="fw-bold text-info" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
          </p>
        </div>
      </div>
    </div>
    <!-- end of .container-->

  </section>
  <!-- <section> close ============================-->
  <!-- ============================================-->


</section>

</body>

</html>