@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    
    <form class="user" method="POST" enctype="multipart/form-data" action="{{ url('admin/dokter') }}">
        @csrf
        <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Tambah Data Dokter</h3>
        <div class="form-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" name="name">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Poliklinik</label>
            <select class="form-control text-center" name="poliklinik">
                @foreach($poliklinik as $p)
                @if(old('poliklinik') == $p->id)
                <option value="{{ $p->id }}" selected>{{ $p->nama }}</option>   
                @else
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endif
                @endforeach
              </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control @error('HP') is-invalid @enderror" placeholder="No Hp" name="HP">
            @error('HP')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat"></textarea>
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="">Jenis Kelamin</label><br>
                <div class="form-check d-inline">
                    <input class="form-check-input" type="radio" name="jk" value="laki-laki"
                        id="flexRadioDefault1">
                    <label class="form-check-label mr-4" for="flexRadioDefault1">
                        Laki - Laki
                    </label>
                </div>
                <div class="form-check d-inline">
                    <input class="form-check-input" type="radio" name="jk" value="perempuan"
                        id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Perempuan
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <img width="100px" height="75px" class="img-preview img-thumbnail mt-2 mb-4"/>
            <input class="form-control-file" id="image" name="image" type="file" onchange="previewImage()">
        </div>
        <div class="form-group"><button type="submit" class="btn btn-primary btn-user px-5">Tambah</button></div>
        </div>
        </div>
    </form>
</div>
<script>
function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
        }
      }
  </script>
@endsection