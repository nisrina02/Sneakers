@extends('template')

@section('content')

<div class="container">
<h1>Tambah Seller Baru</h1>
		<!-- <div class="wrap-contact100"> -->
      <!-- @if($errors->any())
      @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
      @endforeach
      @endif -->
			<form class="row g-3" action="{{ url('admin_store') }}" method="post">
			{{ csrf_field() }}
				<div class="col-md-4">
    				<label for="validationDefault01" class="form-label">Nama Lengkap</label>
    				<input type="text" class="form-control" id="validationDefault01" name="nama" placeholder="Nama Lengkap" required>
  				</div>
				<div class="col-md-4">
					<label for="validationDefault02" class="form-label">Nomor Telepon</label>
					<input type="text" class="form-control" id="validationDefault02" name="telp" placeholder="Nomor Telepon" required>
				</div>
				<div class="col-md-4">
					<label for="validationDefaultUsername" class="form-label">E-Mail</label>
					<div class="input-group">
					<span class="input-group-text" id="inputGroupPrepend2">@</span>
					<input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="email" placeholder="E-Mail" required>
					</div>
				</div>
				<div class="col-md-6">
					<label for="validationDefault03" class="form-label">Password</label>
					<input type="password" class="form-control" id="validationDefault03" name="password" placeholder="Password" required>
				</div>
				<div class="col-12 mt-2">
					<button class="btn btn-primary" type="submit">Simpan</button>
					<a href="{{url('admin')}}" class="btn btn-success">Kembali</a>
				</div>
			</form>
			<br>

		<!-- </div> -->
	</div>


@stop
