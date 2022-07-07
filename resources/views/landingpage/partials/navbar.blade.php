<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
      data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container">
        <a href="{{ url('/') }}"><img class="img-fluid" width="110px"  src="{{ asset('images/Logo.png') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
            <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a></li>
            {{-- <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{ url('landingpage/antrian') }}">Antrian</a></li> --}}
            <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/pendaftaran') }}">Pendaftaran</a></li>
            <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/contact') }}">Contact</a></li>
            {{-- <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/jadwal_dokter') }}">Jadwal Dokter</a></li> --}}
          @if (auth()->user())
        </ul>
        <a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-2" href="{{ url('/logout') }}">Logout</a>
          @else
          <a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4" href="{{ url('login') }}">Login</a>
          <a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-2" href="{{ url('register') }}">Registrasi</a>
          @endif
        </div>
      </div>
    </nav>