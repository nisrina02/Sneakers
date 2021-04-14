@extends('template')
@section('content')

  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <a href="{{ url('barang')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i>Kembali</a>
          </div>
          <div class="col-md-12 mt-3">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <img src="{{ url('uploads') }}/{{ $barang->foto }}" class="rounded mx-auto d-block" width="80%" alt="">
                          </div>
                          <div class="col-md-6 mt-5">
                              <h2>{{ $barang->nama_barang}}</h2>
                              <table class="table">
                                  <tbody>
                                      <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ (number_format($barang->harga))}}</td>
                                      </tr>
                                      <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($barang->stok) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{ $barang->deskripsi }}</td>
                                      </tr>

                                      <form action="{{ url('transaksi_add', $barang->id)}}" method="post">
                                      {{ csrf_field() }}
                                          <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                              <input class="form-control" type="number" name="qty" required="">
                                            </td>
                                          </tr>
                                          <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                              <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                            </td>
                                          </tr>
                                      </form>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
