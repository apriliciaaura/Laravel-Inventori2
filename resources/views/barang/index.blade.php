@extends('layouts.adminmain')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>Barang</h1>
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
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <div class="form-group">
            <a href="{{ route('barang.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
            <a href="{{ route('barang.export') }}">
            <button type="button" class="btn btn-success my-3">Export Excel</button>
            </a>
          </div>
        </div>
           
          <div class="card-body">
          <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">File</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Total</th>
                            <th scope="col">Rusak</th>
                            <th scope="col">Created by</th>
                            <th scope="col">Updated by</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $barang )
                            <tr>
                                <td>{{ $data->firstItem()+$key }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <img src="{{ URL::to('/') }}/images/{{ $barang->image }}" class="img-thumbnail" width="75"/>
                                <td>{{ $barang->ruangan->nama_ruangan }}</td>
                                <td>{{ $barang->total }}</td>
                                <td>{{ $barang->broken }}</td>
                                <td>
                                  @foreach($user as $userdata)
                                    @if($userdata->id == $barang->created_by)
                                      {{$userdata->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                  @foreach($user as $userdata)
                                    @if($userdata->id == $barang->updated_by)
                                      {{$userdata->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('barang.edit', ['id_barang' => $barang->id_barang]) }}">
                                        <button type="button" class="btn btn-sm btn-warning">Edit</button> </a> 
                                    <a href="{{ route('barang.delete', ['id_barang' => $barang->id_barang]) }}"
                                    onclick="return confirm('Delete data?');" 
                                    >
                                    <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"><center>Data kosong</center></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            {!! $data->links() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
            </nav>
          </div>
        </div>
      </div>  
  </div>
</section>
@endsection()