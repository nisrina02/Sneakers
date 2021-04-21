@extends('template')
@section('content')

  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12 mb-3">
              <a href="{{ url('home')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" width="100%" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($transaksi as $tr)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $tr->tgl_transaksi }}</td>
                                    <td>
                                        @if($tr->status == 1)
                                        Belum dibayar
                                        @else
                                        Sudah dibayar
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($tr->total+$tr->kode) }}</td>
                                    <td>
                                        <a href="{{ url('histori', $tr->id) }}" class="btn btn-primary"><i class="fas fa-info"></i> Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                    </div>
                </div>
          </div>
      </div>
  </div>
@endsection
