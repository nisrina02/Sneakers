@extends('template')

@section('content')

    <div class="container mt-2">

    <h1>Keranjang</h1>
          @if (session('alert_message'))
          <div class="alert alert-success">
              {{ session('alert_message') }}
          </div>
          @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>ID Transaksi</th>
                <th>Nama</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($data as $dt)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $dt->id }}</td>
                <td>{{ $dt->nama}}</td>
                <td>{{ $dt->tgl_transaksi}}</td>
                <td>{{ $dt->total}}</td>
                <td>
                  <form action="{{ url('delete_transaksi', $dt->id )}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ url('tampil_detail', $dt->id) }}" class="btn btn-sm btn-primary">Detail</a>
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        <a href="{{url('barang')}}" class="btn btn-sm btn-success">Kembali</a>
    </div>

@stop
