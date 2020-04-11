@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Ruangan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('ruangan.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('ruangan.update', ['id_ruangan' => $data->id_ruangan]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="{{ $data->nama_ruangan }}">
                <br>
                <label>Jurusan</label>
                <select class="form-control" name="jurusan_id">
                          @foreach( $jurusan as $jurusan)
                              <option value="{{ $jurusan->id_jurusan }}" {{ $jurusan->id_jurusan == $data->jurusan_id ? 'selected="selected"' : '' }}> {{ $jurusan->nama_jurusan}} </option>
                          @endforeach
          </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()