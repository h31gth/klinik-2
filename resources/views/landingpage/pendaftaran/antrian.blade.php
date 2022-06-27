@extends('landingpage.layouts.main')

@section('content')

<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size"
      style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <h1 class="text-center mb-4">ANTRIAN</h1>
        <div class="card-body">
            <table class="table table-info text-center mb-4">
                <thead>
                    <tr>
                        <th>Antrian</th>
                        <th>Dokter</th>
                        <th>Poliklinik</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->no_antrian }}</td>
                        <td>{{ $item->dokter }}</td>
                        <td>{{ $item->nama_poli }}</td>
                        <td>{{ $item->status }}</td>
                      </tr>   
                    @endforeach
                  </tbody>
              </table>
        </div>
    </div>

@endsection