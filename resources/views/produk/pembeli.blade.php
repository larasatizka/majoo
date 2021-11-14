@include('layouts.header')

<style type="text/css">
  .top{
    margin-top: -25px;
  }
  .tombol{
    font-size: 13px;
    height: 30px;
    margin-top: 10px;
  }
  .text{
    color: white; 
    font-size: 16px;
  }
  .center{
    text-align: center;
  }
  .ignore{
    text-decoration: none;
  }
</style>

<body style="min-height: 100%;">  

<section class="header-main border-bottom" style="background-color: #00BCD4;">
  <div class="container">
<div class="row align-items-center">
  <div class="col-lg-2 col-6">
    <a href="{{ URL::to('/katalog') }}" class="brand-wrap text" >
      Majoo
    </a> 
  </div>
  <div class="col-lg-6 col-12 col-sm-12">
    <form method="GET" action="{{ URL::to('/search') }}" class="search">
      <div class="input-group w-100">
          <input type="text" id="search" name="search" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
    </form> 
  </div> 
  <div class="col-lg-4 col-sm-6 col-12">
    <div class="widgets-wrap float-md-right">
      <div class="widget-header  mr-3"></div>
      <div class="widget-header  mr-3"></div>
      <div class="widget-header icontext">
        <div>
          <span class="text">Welcome, buyers</span>
        </div>
      </div>
    </div>
  </div> 
</div> 
</div> 
</section>

@include('layouts.navigasi')

<section class="section-content">
  <div class="container">
    @include('layouts.partials.notification')
    <header class="section-heading">
      <center>
        <h3 class="section-title">Products</h3>
      </center>
    </header>
      
    <div class="row">
      @foreach($data AS $key => $value)
      <div class="col-md-3" href="#">
        <div href="#" class="card card-product-grid">
          <a href="#" class="img-wrap"> 
            <img style="width: 170px; height: 170px; margin-top: 10px;" src="{{ asset('asset') }}/{{ $value->foto_produk }}"> 
          </a>
          <hr class="top">
          <figcaption class="info-wrap top">
            <a class="title center"><b>{{ $value->nama_produk }}</b></a>
            <a class="center"><div class="price mt-1">Rp. {{ number_format($value->harga, 2) }}</div></a><br>
            <a class="title">{!! $value->deskripsi !!}</a><br>
            <div class="center"><a class="btn btn-primary tombol text-center" style="color: #FFFFFF;">Beli</a></div>
          </figcaption>
        </div>
      </div> 
      @endforeach

    </div>
  </div> 

</section>

</body>

</html>