@extends('template')

@section('content')

    <div class="container mt-2">
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-6">
                  <h1><i class="fa fa-pencil-alt"></i> Edit Seller</h1>
                </div>
              </div>
              <div class="card-body">
			  	@foreach($data as $dt)
				<form class="row g-3" action="{{ url('seller_update', $dt->id) }}" method="post">
					{{ csrf_field() }}
            		{{ method_field('PUT') }}
					<div class="col-md-12 mb-3">
						<label for="validationDefault01" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" id="validationDefault01" name="nama" placeholder="Nama Lengkap" value="{{ old('nama', $dt->nama) }}">
						@error('nama')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationDefault02" class="form-label">Nomor Telepon</label>
						<input type="text" class="form-control @error('telp') is-invalid @enderror" id="validationDefault02" name="telp" placeholder="Nomor Telepon" value="{{ old('telp', $dt->telp) }}">
						@error('telp')
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
            	@endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop























