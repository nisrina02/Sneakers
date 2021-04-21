@extends('template')

@section('content')

    <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-6">
                  <h1><i class="fa fa-plus"></i> Add New Merchant</h1>
                </div>
              </div>
              <div class="card-body">
			  	<form class="row g-3" action="{{ url('merchant_store') }}" method="post">
					{{ csrf_field() }}
					<div class="col-md-12 mb-3">
						<label for="validationDefault01" class="form-label">Nama Toko</label>
						<input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="validationDefault01" name="nama_toko" value="{{ old('nama_toko') }}" placeholder="Nama Toko">
						@error('nama_toko')
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
						<label for="validationDefault04" class="form-label">ID Seller</label>
						<select class="form-control @error('id_user') is-invalid @enderror" id="validationDefault04" name="id_user" value="{{ old('id_user') }}">
						<option selected disabled value="">--Seller--</option>
						@foreach($data as $dt)
						<option value="{{ $dt->id }}">{{ $dt->nama }}</option>
						@endforeach
						</select>
						@error('id_user')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-12">
						<button class="btn btn-primary" type="submit">Simpan</button>
						<a href="{{url('merchant')}}" class="btn btn-success">Kembali</a>
					</div>
				</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop












