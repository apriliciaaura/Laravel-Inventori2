@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('jurusan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ route('jurusan.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
            &nbsp
            <a href="{{ route('jurusan.export') }}">
            <button type="button" class="btn btn-primary">Export Excel</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Fakultas</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $key => $jurusan)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $jurusan->nama_jurusan }}</td>
                  <td>{{ $jurusan->fakultas->nama_fakultas }}</td>
                  <td>
                  <a href="{{ route('jurusan.edit', ['id_jurusan' => $jurusan->id_jurusan]) }}">
                    <button type="button" class="btn btn-sm btn-info">Edit</button>
                  </a>
                   <a href="{{ route('jurusan.delete', ['id_jurusan' => $jurusan->id_jurusan]) }}"
                    onclick="return confirm('Delete data?');">
                    <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                  </a>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
            </nav>
            {{ $data->links() }}
          </div>
        </div>
      </div>  
  </div>
</section>
@endsection()