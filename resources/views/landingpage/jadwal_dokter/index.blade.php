@extends('landingpage.layouts.main')

@section('content')
<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size"
      style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <h1 class="text-center mb-4">JADWAL DOKTER</h1>
        <div class="card-body">
            <table class="table table-info text-center mb-4">
                <thead>
                    <tr>
                        <th>Dokter</th>
                        <th>Poliklinik</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->dokter }}</td>
                        <td>{{ $item->poli }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->jam_mulai }}</td>
                        <td>{{ $item->jam_selesai }}</td>
                      </tr>   
                    @endforeach
                  </tbody>
              </table>
        </div>
    </div>
@endsection