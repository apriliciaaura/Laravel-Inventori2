@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Jurusan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('jurusan.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('jurusan.update', $jurusan->id_jurusan) }}" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="nama_jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}">
                <br>
                <label>Fakultas</label>
                <select class="form-control" name="fakultas_id">
                          @foreach( $fakultas as $fakultas)
                              <option value="{{ $fakultas->id }}" {{ $fakultas->id == $jurusan->fakultas_id ? 'selected="selected"' : '' }}> {{ $fakultas->nama_fakultas}} </option>
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