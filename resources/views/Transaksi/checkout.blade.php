@extends('template')
@section('content')

  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12 mb-3">
              <a href="{{ url('home')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i>Kembali</a>
          </div>
          <div class="col-md-12">
                <div class="card">
                @if(!empty($transaksi))
                    <div class="card-header">
                        <h3><i class="fa fa-shopping-cart"></i>Checkout</h3>
                        <p>Tanggal Transaksi : {{ $transaksi->tgl_transaksi }}</p>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered" width="100%" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($detail as $dtl)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dtl->nama_barang }}</td>
                                    <td>{{ $dtl->qty }}</td>
                                    <td>Rp. {{ number_format($dtl->harga) }}</td>
                                    <td>Rp. {{ number_format($dtl->subtotal) }}</td>
                                    <td>
                                        <form action="{{ url('delete_checkout', $dtl->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td align="right" colspan="4"><strong>Total Harga :</strong></td>
                                    <td><strong>Rp. {{ number_format($transaksi->total) }}</strong></td>
                                    <td>
                                        <a href="{{ url('konformasi') }}" class="btn btn-success">Checkout</a>
                                    </td>
                                </tr>
                                    
                                
                            
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
          </div>
      </div>
  </div>
@endsection
