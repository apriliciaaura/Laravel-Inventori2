@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan <small>Add Data</small></h1>
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
            <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control">
              </div>
              <div class="form-group">
                <label>Fakultas</label>
                <select class="form-control" id="fakultas_id" name="fakultas_id" class="form-control">
                  <option value="" hidden>Pilih Fakultas</option>
                  @foreach($fakultas as $f)
                  <option value="{{ $f->id }}"> {{ $f->nama_fakultas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()