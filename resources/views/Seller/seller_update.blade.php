@extends('template')

@section('content')

<div class="container mt-2">
<h1>Update Data Seller</h1>
		<!-- <div class="wrap-contact100"> -->
      <!-- @if($errors->any())
      @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
      @endforeach
      @endif -->
      @foreach($data as $dt)
			<form class="row g-3" action="{{ url('seller_update', $dt->id) }}" method="post">
			{{ csrf_field() }}
            {{ method_field('PUT') }}
				<div class="col-md-4">
    				<label for="validationDefault01" class="form-label">Nama Lengkap</label>
    				<input type="text" class="form-control" id="validationDefault01" name="nama" placeholder="Nama Lengkap" value="{{ $dt->nama }}" required>
  				</div>
				<div class="col-md-4">
					<label for="validationDefault02" class="form-label">Nomor Telepon</label>
					<input type="text" class="form-control" id="validationDefault02" name="telp" placeholder="Nomor Telepon" value="{{ $dt->telp }}" required>
				</div>
				<div class="col-12 mt-2">
					<button class="btn btn-primary" type="submit">Simpan</button>
					<a href="{{url('seller')}}" class="btn btn-success">Kembali</a>
				</div>
			</form>
            @endforeach
		<!-- </div> -->
	</div>
@stop
