@extends('template')

@section('content')

    <div class="container mt-2">
      <div class="row">
        <div class="col-md-6 mb-2">
          <a href="{{ url('home')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-6">
                  <h1>Merchant</h1>
                  @if (session('alert_pesan'))
                      <div class="alert alert-success">
                          {{ session('alert_pesan') }}
                      </div>
                  @endif
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Merchant</th>
                      <th>Nama Toko</th>
                      <th>Alamat</th>
                      <th>ID Seller</th>
                      <th>Nama Seller</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- @php $no = 1; @endphp -->
                    @foreach($data as $dt)
                    <tr>
                      <td>{{ $dt->id }}</td>
                      <td>{{ $dt->nama_toko}}</td>
                      <td>{{ $dt->alamat}}</td>
                      <td>{{ $dt->id_user}}</td>
                      <td>{{ $dt->nama}}</td>
                      <td>
                        <form action="{{ url('merchant_destroy', $dt->id )}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <a href="{{ url('merchant_edit', $dt->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <a href="{{url('merchant_create')}}" class="btn btn-success"><i class="fas fa-plus"></i> ADD NEW</a>
              </div>
            </div>
          </div>
        </div>
        <div class="container mt-3">
          {{ $data->links() }}
        </div>
      </div>
    </div>

@stop











