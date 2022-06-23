@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <form class="user" method="POST" enctype="multipart/form-data" action="{{ url('admin/poliklinik/'.$data->id) }}">
        @csrf
        @method('PUT')
            <h3 class="mb-3">Edit Data Poliklinik</h3>
            <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Poliklinik" name="nama" value="{{ $data->nama }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Deskripsi">{{ $data->deskripsi }}</textarea>
                    @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="{{ asset($data->image) }}" width="100px" height="75px" class="img-preview img-thumbnail mt-2 mb-4"/>
                    <input class="form-control-file" id="image" name="image" type="file" onchange="previewImage()">
                </div>
        <div class="form-group"><button type="submit" class="btn btn-primary btn-user px-5">Edit</button></div>
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