@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <form class="user" method="POST" enctype="multipart/form-data" action="{{ url('admin/dokter/'.$data->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Edit Data Dokter</h3>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="">Poliklinik</label>
            <select class="form-control text-center" name="poliklinik">
                @foreach($poliklinik as $p)
                @if(old('poliklinik',$data->poli_id) == $p->id)
                <option value="{{ $p->id }}" selected>{{ $p->nama }}</option>   
                @else
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endif
                @endforeach
              </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="No Hp" name="HP" value="{{ $data->HP }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="alamat" placeholder="Alamat" required>{{ $data->alamat }}</textarea>
        </div>
        @if ($data->jk == "laki-laki")
            <div class="form-check">
           <input class="form-check-input" checked type="radio" name="jk" value="laki-laki" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Laki - Laki
            </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="perempuan" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Perempuan
                </label>
            </div>
            @else
            <div class="form-check">
            <input class="form-check-input"  type="radio" name="jk" value="laki-laki"
                                            id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                                            Laki - Laki
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" checked type="radio" name="jk" value="perempuan"
                                            id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
            Perempuan
            </label>
            </div>
            @endif
        <div class="form-group">
            <img id="output" src="{{ asset($data->image) }}" width="100px" height="75px" class="img-preview img-thumbnail mt-2 mb-4"/>
            <input class="form-control-file" name="image" type="file" id="image" accept="image/*" onchange="previewImage()">
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