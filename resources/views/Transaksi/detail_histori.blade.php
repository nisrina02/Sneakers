@extends('template')

@section('content')

    <div class="container mt-2">

    <h1>Detail Keranjang</h1>
          @if (session('alert_message'))
          <div class="alert alert-success">
              {{ session('alert_message') }}
          </div>
          @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($data as $dt)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $dt->tgl_transaksi }}</td>
                <td>{{ $dt->nama_barang}}</td>
                <td>{{ $dt->qty}}</td>
                <td>{{ number_format($dt->harga) }}</td>
                <td>{{ number_format($dt->subtotal) }}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
        <?php if(Session::get('level')=="customer") {?>
        <a href="{{url('tampil_transaksi')}}" class="btn btn-sm btn-warning">Kembali</a>
        <?php } ?>
        <?php if(Session::get('level')<>"customer") {?>
        <a href="{{url('transaksi')}}" class="btn btn-sm btn-warning">Kembali</a>
        <?php }?>
    </div>
    <div class="container mt-3">
      {{ $data->links() }}
    </div>
@stop
