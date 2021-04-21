@extends('template')

@section('content')

    <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-6">
                  <h1><i class="fa fa-plus"></i> Add New Seller</h1>
                </div>
              </div>
              <div class="card-body">
			  	<form class="row g-3" action="{{ url('seller_store') }}" method="post">
					{{ csrf_field() }}
					<div class="col-md-12 mb-3">
						<label for="validationDefault01" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="validationDefault01" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
						@error('nama')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationDefault02" class="form-label">Nomor Telepon</label>
						<input type="text" class="form-control @error('telp') is-invalid @enderror" id="validationDefault02" name="telp" value="{{ old('telp') }}" placeholder="Nomor Telepon">
						@error('telp')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationDefault02" class="form-label">Alamat</label>
						<input type="text" class="form-control @error('alamat') is-invalid @enderror" id="validationDefault02" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
						@error('alamat')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationDefaultUsername" class="form-label">E-Mail</label>
						<input type="text" class="form-control @error('email') is-invalid @enderror" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="email" value="{{ old('email') }}" placeholder="E-Mail">
						@error('email')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationDefault03" class="form-label">Password</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="validationDefault03" name="password" value="{{ old('password') }}" placeholder="Password">
						@error('password')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
				
					<div class="col-12">
						<button class="btn btn-primary" type="submit">Simpan</button>
						<a href="{{url('seller')}}" class="btn btn-success">Kembali</a>
					</div>
				</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop