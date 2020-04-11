@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang <small>Add Data</small></h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('barang.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Barang</label>
                <input type="text" name="nama_barang" class="form-control">
              </div>
              <div class="form-group">
                <label>Ruangan</label>
                <select class="form-control" id="ruangan_id" name="ruangan_id" class="form-control">
                  <option value="" hidden>Pilih Ruangan</option>
                  @foreach($ruangan as $r)
                  <option value="{{ $r->id_ruangan }}"> {{ $r->nama_ruangan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Total</label>
                    <input type="text" name="total" class="form-control input-lg" />
            </div>
            <div class="form-group">
                <label>Rusak</label>
                    <input type="text" name="broken" class="form-control input-lg" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="created_by" id="created_by" value="{{auth()->user()->id}}" hidden>
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