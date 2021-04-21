@extends('template')
@section('content')

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-user"></i> My Profile</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $profil->nama }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:</td>
                                <td>{{ $profil->telp }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $profil->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $profil->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-pencil-alt"></i> Edit Profil</h4>
                    <hr>
                    <form action="{{url('/profil_edit')}}" class="login-form" method="post">
						{{ csrf_field() }}
                        <div class="form-group">
		      			    <input type="text" class="form-control rounded-left" name="nama" value="{{ $profil->nama }}" placeholder="Nama Lengkap" required>
		      		    </div>
                        <div class="form-group">
		      			    <input type="text" class="form-control rounded-left" name="telp" value="{{ $profil->telp }}" placeholder="Nomor Telepon" required>
		      		    </div>
                        <div class="form-group d-flex">
                            <textarea name="alamat" id="" class="form-control rounded-left" placeholder="Alamat" required>{{ $profil->alamat }}</textarea>
	                    </div>
		      		    <div class="form-group">
		      			    <input type="text" class="form-control rounded-left" name="email" value="{{ $profil->email }}" placeholder="Email" required>
		      		    </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success rounded submit">Simpan</button>
                        </div>
	                </form> 
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
