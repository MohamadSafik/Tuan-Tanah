<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>checkout</title>
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />



  <!-- Bootstrap core CSS -->
  <link href="/css/checkout/bootstrap.min.css" rel="stylesheet">
  <link href="img/shop/image.png" rel='shortcut icon'>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/bootstrap.min.css') }}" />

  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/slick.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/slick-theme.css') }}" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/nouislider.min.css') }}" />

  <!-- Font Awesome Icon -->



  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/shop/style.css') }}" />

  <script src="{{ asset('js/app.js') }}" defer></script>



  <!-- Custom styles for this template -->
  <!-- <link href="../checkout/form-validation.css" rel="stylesheet"> -->
</head>
<div id="top-header">
  <div class="container">
    <ul class="header-links pull-left">
      <li><a href="#"><i class="fas fa-home"></i>Tuan Tanah</a></li>



      <li><a href="/user/user_transaksi1"><i class="fas fa-shopping-cart"></i>
          Transaksi
          <i class="badge fas fa-bell bg-danger" style="font-size: 10px; color:white">3</i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
           
            <span class="visually-hidden"></span>
          </span>
        </a></li>

    </ul>

    <ul class="header-links pull-right">

      @guest
      @if (Route::has('login'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @endif

      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
      @endif
      @else
      @if (Auth::user()->level == 'user')
      <li class="">
        <a id="" class="" href="/user/user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <i class="far fa-user"></i> {{ Auth::user()->name }}
        </a>
        @else
      <li class="">
        <a id="" class="" href="/admin/admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <i class="far fa-user"></i> {{ Auth::user()->name }}
        </a>
        @endif


        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">

        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>

      </li>
      @endguest

    </ul>


  </div>
</div>


<body class="bg-light">

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Checkout</h2>
        <p><strong>NO REK BCA : 3212334354352 A/N THESAR</strong></p>
      </div>
      @foreach($produk as $p)
      <form class="needs-validation" novalidate action="/checkout" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-5">
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-dark">cart</span>
              <!-- <span class="badge bg-primary rounded-pill">3</span> -->
            </h4>

            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 style="font-size:15px" class="my-1" name="produk">{{ strtoupper($p->produk) }}</h6>
                  <small class="" name="jenis">{{strtoupper ($p->jenis) }} |</small>
                  <small class="" name="alamat">{{strtoupper ($p->alamat) }}</small>
                </div>
                <span class=" fw-bold" name="harga">{{ "Rp ".number_format($p->harga,0,',','.') }}</span>


              </li>
              @endforeach

              <li class="list-group-item d-flex justify-content-between">
                <span class="fw-bold">Total</span>
                <strong>{{ "Rp ".number_format($p->harga,0,',','.') }}</strong>
              </li>
            </ul>

          </div>

          <div class="col-md-7 col-lg-8">

            <div class="col-sm-6">
              <input type="hidden" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="" value="{{ $p->id }}" name="id" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>


            <div class="col-sm-6">
              <input type="hidden" class="form-control @error('total') is-invalid @enderror" id="total" placeholder="" value="{{ $p->harga }}" name="total" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>



            <div class="row ">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Nama Depan</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstName" placeholder="" value="" name="first_name" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastName" placeholder="" value="" name="last_name" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>


            <div class="col-12">
              <label for="no_hp" class="form-label">Nomor HP</label>
              <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="" value="" name="no_hp" required>
              <div class="invalid-feedback">
                Valid Nomor is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="you@example.com" name="email" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>




            <div class="col-12">
              <label for="address" class="form-label">Alamat</label>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="1234 Main St" name="address" s required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <div class="col-12">
              <label for="status" class="form-label"></label>
              <input type="hidden" class="form-control" id="status" value="belum dibayar" name="status" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <label class="my -6" for="payment" class="form-label">Metode Pembayaran</label>

            <div class="my 1">
              <div class="form-check">
                <input id="credit" name="payment" type="radio" value="BRI" class="form-check-input @error('payment') is-invalid @enderror" checked required>
                <label class="badge form-check-label bg-secondary" for="credit">BRI</label>
              </div>
              <div class="form-check">
                <input id="debit" name="payment" type="radio" value="BCA" class="form-check-input @error('payment') is-invalid @enderror" required>
                <label class="badge form-check-label bg-secondary" for="debit">BCA</label>
              </div>
              <div class="form-check">
                <input id="paypal" name="payment" type="radio" value="MANDIRI" class="form-check-input @error('payment') is-invalid @enderror" required>
                <label class="badge form-check-label bg-secondary" for="paypal">MANDIRI</label>
              </div>
            </div>
            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" onclick="return confirm ('lanjutkan checkout')" type="submit">Lanjutkan Checkout</button>
          </div>
      </form>
  </div>
  </div>
  </main>

  < </div>




    <!-- <script src="js/checkout/form-validation.js"></script> -->
</body>

</html>