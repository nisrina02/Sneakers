@extends('template')

@section('content')

<div class="container mt-2">
<h1>Tambah Merchant Baru</h1>
		<!-- <div class="wrap-contact100"> -->
      <!-- @if($errors->any())
      @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
      @endforeach
      @endif -->
			<form class="row g-3" action="{{ url('merchant_store') }}" method="post">
			{{ csrf_field() }}
				<div class="col-md-4">
    				<label for="validationDefault01" class="form-label">Nama Toko</label>
    				<input type="text" class="form-control" id="validationDefault01" name="nama_toko" placeholder="Nama Toko" required>
  				</div>
				<div class="col-md-4">
					<label for="validationDefault02" class="form-label">Alamat</label>
					<input type="text" class="form-control" id="validationDefault02" name="alamat" placeholder="Alamat" required>
				</div>
				<div class="col-md-3">
					<label for="validationDefault04" class="form-label">ID Seller</label>
					<select class="form-control" id="validationDefault04" name="id_user" required>
					<option selected disabled value="">--Seller--</option>
					@foreach($data as $dt)
					<option value="{{ $dt->id }}">{{ $dt->nama }}</option>
					@endforeach
					</select>
				</div>
				<div class="col-12 mt-2">
					<button class="btn btn-primary" type="submit">Simpan</button>
					<a href="{{url('merchant')}}" class="btn btn-success">Kembali</a>
				</div>
			</form>
			<br>

		<!-- </div> -->
	</div>


@stop
