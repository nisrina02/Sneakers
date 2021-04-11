@extends('template')

@section('content')

<section class="section-intro padding-y-sm">
<div class="container">

<div class="intro-banner-wrap">
  <img src="{{url('Image/tes.jpg')}}" style="height:300px; width:1200px" class="img-fluid rounded">
</div>

</div> <!-- container //  -->
</section>

<section class="section-intro padding-y-sm">
<div class="container">

<div class="intro-banner-wrap">
  <!-- <img src="{{asset('shop')}}//images/1.jpg" class="img-fluid rounded"> -->
  <h4 style="font-color:black;">Selamat datang di SNEAKERS</h4>
</div>

</div> <!-- container //  -->
</section>

<section class="section-content padding-bottom-sm">
<div class="container">

<header class="section-heading">
  <a href="{{ url('barang') }}" class="btn btn-outline-primary float-right">See all</a>
  <h3 class="section-title">Our Products</h3>
</header><!-- sect-heading -->

<div class="row">
  <div class="col-md-3">
    <div href="#" class="card card-product-grid">
      <a href="#" class="img-wrap"> <img src="{{url('Image/90S VALASION SHOES.jpg')}}"> </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">90S VALASION SHOES</a>
        <div class="price mt-1">Rp. 500.000</div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3">
    <div href="#" class="card card-product-grid">
      <a href="#" class="img-wrap"> <img src="{{url('Image/COURTJAM BOUNCE SHOES.jpg')}}"> </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">COURTJAM BOUNCE SHOES</a>
        <div class="price mt-1">Rp. 700.000</div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3">
    <div href="#" class="card card-product-grid">
      <a href="#" class="img-wrap"> <img src="{{url('Image/GAMECOURT TENNIS SHOES.jpg')}}"> </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">GAMECOURT TENNIS SHOES</a>
        <div class="price mt-1">Rp. 400.000</div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div> <!-- col.// -->
  <div class="col-md-3">
    <div href="#" class="card card-product-grid">
      <a href="#" class="img-wrap"> <img src="{{url('Image/NIZZA HI ALIFE SHOES.jpg')}}"> </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">NIZZA HI ALIFE SHOES</a>
        <div class="price mt-1">Rp. 900.000</div> <!-- price-wrap.// -->
      </figcaption>
    </div>
  </div> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>

@stop
