@extends('template')

@section('content')

<section class="section-content">
<div class="container">

<header class="section-heading">
  <h3 class="section-title">All products</h3>
</header><!-- sect-heading -->


<div class="row">
  @foreach($data as $dt)
  <div class="col-md-3">
    <div href="#" class="card card-product-grid">
      <a href="#" class="img-wrap"> <img src="/Uploads/{{$dt->foto}}" alt="pict"> </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">{{ $dt->nama_barang }}</a>

        <div class="rating-wrap">
          <ul class="rating-stars">
            <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </li>
            <li>
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </li>
          </ul>
        </div>
        <div class="price mt-2">Rp. {{ $dt->harga }}</div> <!-- price-wrap.// -->
        <div class="price mt-2">
            <a href="{{ url('transaksi', $dt->id) }}" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> Pesan</a>
            <a href="{{ url('barang', $dt->id) }}" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Detail Product</a>
        </div>
      </div>
      </figcaption>
  </div> <!-- col.// -->
  @endforeach
</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>

@stop
