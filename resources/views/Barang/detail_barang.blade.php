@extends('template')
@section('content')

  <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
              <a href="{{ url('barang')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="col-md-12 mt-3">
          @foreach($data as $data)
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <img src="/Uploads/{{$data->foto}}" class="rounded mx-auto d-block" width="70%" alt="">
                          </div>
                          <div class="col-md-6 mt-5">
                              <h2>{{ $data->nama_barang}}</h2>
                              <table class="table">
                                  <tbody>
                                      <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ (number_format($data->harga))}}</td>
                                      </tr>
                                      <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($data->stok) }}</td>
                                      </tr>
                                      <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{{ $data->deskripsi }}</td>
                                      </tr>
                                      <tr>
                                        <td>Toko</td>
                                        <td>:</td>
                                        <td>{{ ($data->nama_toko)}}</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
@endsection
