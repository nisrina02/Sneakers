@extends('template')
@section('content')

  <div class="container mt-4">
      <div class="row">
          <div class="col-md-12">
              <a href="{{ url('home')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i>Kembali</a>
          </div>
          <div class="col-md-12 mt-3">
     
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6 mt-5">
                              <h2>{{ Session::get('nama') }}</h2>
                              <table class="table">
                                  <tbody>
                                      <tr>
                                        <td>Nomor Telepon</td>
                                        <td>:</td>
                                        <td>{{ Session::get('telp') }}</td>
                                      </tr>
                                      <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ Session::get('email') }}</td>
                                      </tr>
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
