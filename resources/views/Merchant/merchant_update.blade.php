@extends('template')

@section('content')

    <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-6">
                  <h1><i class="fa fa-pencil-alt"></i> Edit Merchant</h1>
                </div>
              </div>
              <div class="card-body">
			  	@foreach($data as $dt)
				<form class="row g-3" action="{{ url('merchant_update', $dt->id) }}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="col-md-12 mb-3">
						<label for="validationDefault01" class="form-label">Nama Toko</label>
						<input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="validationDefault01" name="nama_toko" placeholder="Nama Toko" value="{{ old('nama_toko', $dt->nama_toko) }}">
						@error('nama_toko')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationDefault02" class="form-label">Alamat</label>
						<input type="text" class="form-control @error('alamat') is-invalid @enderror" id="validationDefault02" name="alamat" placeholder="Alamat" value="{{ old('alamat', $dt->alamat) }}" required>
						@error('alamat')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationDefault03" class="form-label">ID Seller</label>
						<input type="text" class="form-control" id="validationDefault03" name="id_user" placeholder="ID Seller" value="{{ $dt->id_user }}" readonly>
					</div>
					<div class="col-12">
						<button class="btn btn-primary" type="submit">Simpan</button>
						<a href="{{url('merchant')}}" class="btn btn-success">Kembali</a>
					</div>
				</form>
            	@endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop
















