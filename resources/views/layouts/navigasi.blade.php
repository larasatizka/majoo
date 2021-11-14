<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
  <div class="container">
    <div class="collapse navbar-collapse" id="main_nav" >
      <ul class="navbar-nav" style="text-align: center;">
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('katalog') }}">All Category</a>
        </li>
        @foreach($kategori AS $key => $value)
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('produkkategori/'.$value->nama_kategori) }}">{{ $value->nama_kategori }}</a>
        </li>
        @endforeach
      </ul>
    </div> 
  </div> 
</nav>