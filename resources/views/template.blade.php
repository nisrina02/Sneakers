<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SNEAKERS</title>
        <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       <!-- Custom styles for this template -->
       <link rel="stylesheet" href="{{asset('shop')}}/css/bootstrap.css">
       <link rel="stylesheet" href="{{asset('shop')}}/css/ui.css">
       <link rel="stylesheet" href="{{asset('shop')}}/css/responsive.css">

        <link href="{{asset('shop')}}/css/all.min.cs">
        <script src="{{asset('shop')}}/js/jquery.min.js" type="text/javascript"></script>
        <script src="{{asset('shop')}}/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    </head>
    <body>

<header class="section-header">

<nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
<div class="container">
    <ul class="navbar-nav d-none d-md-flex mr-auto">
    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/home') }}">Beranda</a>
                    </li>
                    <!-- 
                    <li class="nav-item">
                     <a class="nav-link" href="{{ url('/barang') }}">Items</a>
                    </li>
                    -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li> -->
                    <?php if(Session::get('level')=="seller") {?>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('/barang_admin') }}">Items</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi</a>
                    </li>
                    <?php } ?>
                    <?php if(Session::get('level')=="admin") {?>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/seller') }}">Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/merchant') }}">Merchant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi</a>
                    </li>
                  <?php } ?>
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
        <li><a class="dropdown-item" href="#">Arabic</a></li>
        <li><a class="dropdown-item" href="#">Russian </a></li>
        </ul>
    </li>
  </ul> <!-- list-inline //  -->

</div> <!-- container //  -->
</nav> <!-- header-top-light.// -->

<section class="header-main border-bottom">
  <div class="container">
<div class="row align-items-center">
  <div class="col-lg-2 col-6">
    <a href="{{ url('home') }}" class="brand-wrap">
     <h4>SNEAKERS</h4> 
    </a> <!-- brand-wrap.// -->
  </div>
  <div class="col-lg-6 col-12 col-sm-12">
    <form action="#" class="search">
      <div class="input-group w-100">
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
    </form> <!-- search-wrap .end// -->
  </div> <!-- col.// -->
  <div class="col-lg-4 col-sm-6 col-12">
    <div class="widgets-wrap float-md-right">
      <div class="widget-header  mr-3">
        <?php
          $trans = \App\Models\Transaksi::where('id_user', Session::get('id'))->where('status', 0)->first();
          if(!empty($trans)){
            $notif = \App\Models\DetailTransaksi::where('id_transaksi', $trans->id)->count();
          }
        ?>
        <a href="{{ url('checkout') }}">
            <img src="{{asset('shop')}}//images/tes.jpg" class="icon icon-sm rounded-circle border">
            <i class="fa fa-shopping-cart"></i>
            @if(!empty($notif))
            <span class="badge badge-danger">{{ $notif }}</span>
            @endif    
        </a>
      </div>
      <div class="widget-header icontext">
        <div class="text">
       
        <a href="{{ url('profil') }}/{{ Session::get('id') }}">
          <span class="text-muted">welcome, {{ Session::get('nama') }}</span>
          </a>
     
          <div>
            <a href="{{ url('log out') }}">Logout</a>
            <!-- <a href="{{ url('/register')}}"> Register</a> -->
          </div>
        </div>
      </div>
    </div> <!-- widgets-wrap.// -->
  </div> <!-- col.// -->
</div> <!-- row.// -->
  </div> <!-- container.// -->
</section> <!-- header-main .// -->



</header> <!-- section-header.// -->



<!-- ========================= SECTION INTRO ========================= -->

<!-- ========================= SECTION INTRO END// ========================= -->


<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-content padding-y-sm">
<div class="container">
<article class="card card-body">
@yield('content')
</div>
</article>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->

<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION CONTENT ========================= -->

<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->

<!-- ========================= SECTION CONTENT END// ========================= -->


    <!-- </figure> --> <!-- item-logo.// -->
  <!-- </div>--> <!-- col.// -->
  <!-- <div class="col-md-2  col-6">
    <figure class="box item-logo">
      <a href="#"><img src="{{asset('shop')}}/assets/images/logos/logo5.png"></a>
      <figcaption class="border-top pt-2">41 Products</figcaption> -->
    <!-- </figure> --> <!-- item-logo.// -->
  <!--</div>--> <!-- col.// -->
  <!-- <div class="col-md-2  col-6">
    <figure class="box item-logo">
      <a href="#"><img src="{{asset('shop')}}/images/logos/logo2.png"></a>
      <figcaption class="border-top pt-2">12 Products</figcaption> -->
  <!--  </figure> --> <!-- item-logo.// -->
  <!-- </div> --> <!-- col.// -->
<!--</div> --> <!-- row.// -->
<!--</div>--><!-- container // -->
<!--</section>-->
<!-- ========================= SECTION  END// ========================= -->



<!-- ========================= SECTION  ========================= -->
<!-- <section class="section-name padding-y">
<div class="container">

<h3 class="mb-3">Download app demo text</h3>

<a href="#"><img src="{{asset('shop')}}/images/misc/appstore.png" height="40"></a>
<a href="#"><img src="{{asset('shop')}}/images/misc/appstore.png" height="40"></a> -->

</div><!-- container // -->
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
    </body>
</html>
