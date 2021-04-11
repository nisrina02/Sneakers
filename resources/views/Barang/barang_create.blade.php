@extends('template')

@section('content')

<div class="container mt-2">
<h1>Tambah Barang Baru</h1>
		<!-- <div class="wrap-contact100"> -->
      <!-- @if($errors->any())
      @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
      @endforeach
      @endif -->
			<form class="row g-3" action="{{ url('barang_store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="col-md-4">
    				<label for="validationDefault01" class="form-label">Nama Barang</label>
    				<input type="text" class="form-control" id="validationDefault01" name="nama_barang" placeholder="Nama Barang" required>
  				</div>
				<div class="col-md-4">
					<label for="validationDefault02" class="form-label">Jenis Barang</label>
					<input type="text" class="form-control" id="validationDefault02" name="jenis" placeholder="Jenis Barang" required>
				</div>
				<div class="col-md-4">
					<label for="validationDefaultUsername" class="form-label">Harga</label>
					<div class="input-group">
					<input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" name="harga" placeholder="Harga" required>
					</div>
				</div>
				<div class="mb-3">
				<label for="validationDefault03" class="form-label">Foto Barang</label>
					<input type="file" class="form-control" aria-label="file example" name="foto" required>
  				</div>
				<div class="col-md-3">
					<label for="validationDefault03" class="form-label">Stok</label>
					<input type="text" class="form-control" id="validationDefault03" name="stok" placeholder="Stok" required>
				</div>
					<div class="col-md-3">
						<label for="validationDefault04" class="form-label">ID Merchant</label>
						<select class="form-control" id="validationDefault04" name="id_merchant" required>
						<option selected disabled value="">--Merchant--</option>
						@foreach($data as $dt)
						<option value="{{ $dt->id }}">{{ $dt->nama_toko }}</option>
						@endforeach
						</select>
					</div>
					<div class="col-md-6">
	    				<label for="validationTextarea" class="form-label">Deskripsi Barang</label>
	    				<textarea class="form-control" id="validationTextarea" name="deskripsi" placeholder="Deskripsi Barang" required></textarea>
	    			</div>
				<div class="col-12 mt-2">
					<button class="btn btn-primary" type="submit">Simpan</button>
					<a href="{{url('barang')}}" class="btn btn-success">Kembali</a>
				</div>
			</form>
		<!-- </div> -->
	</div>


@stop
