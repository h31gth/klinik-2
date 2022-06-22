<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block"
      data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container">
        <a href="{{ url('/') }}"><h1>Klinik</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
            <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{ url('landingpage/about') }}">Antrian</a></li>
            <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/pendaftaran') }}">Pendaftaran</a></li>
            <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/jadwal_dokter') }}">Jadwal Dokter</a></li>
            <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/poliklinik') }}">Poliklinik</a></li>
            <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/dokter') }}">Dokter </a></li>
            <li class="nav-item px-2"><a class="nav-link" href="{{ url('landingpage/kontak') }}">Kontak</a></li>
          @if (auth()->user())
          <li class="nav-item dropdown px-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ (auth()->user()->name) }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-list"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item"  href="{{ url('/logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
          @else
          <a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-4" href="{{ url('login') }}">Login</a>
          <a class="btn btn-sm btn-outline-primary rounded-pill order-1 order-lg-0 ms-lg-2" href="{{ url('registrasi') }}">Registrasi</a>
          @endif
        </div>
      </div>
    </nav>