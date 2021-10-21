<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Tuan Tanah</title>

	<link href="img/shop/image.png" rel='shortcut icon'>

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
	<!-- <link rel="stylesheet" href="{{ asset('css/shop/font-awesome.min.css') }}"> -->

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/shop/style.css') }}" />

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fas fa-home"></i>Tuan Tanah</a></li>

					
					
					<li><a href="/user/user_transaksi1" ><i   class="fas fa-shopping-cart"></i>
						Transaksi
						<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
							<i class="fas fa-bell" style="font-size: 10px; color:white">3</i>
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
						<a id="" class=" fw-bold" href="/user/user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							<a href="/user/user"><i class="far fa-user"></i> {{ Auth::user()->name }}</a>
						</a>
						@else
					<li class="">
						<a id="" class=" fw-bold" href="/admin/admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							<a href="/admin/admin"><i class="far fa-user"></i> {{ Auth::user()->name }}</a>
						</a>
						@endif

						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

							<i class="fas fa-power-off" style= "color:red"> </i> {{ __('Logout') }}
						</a></li>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
			</div>
			</li>
			@endguest

			</ul>


		</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">

			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="img/shop/image.png" alt="" height="150px">

							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form action="/home/search" method="get">
								<input type="text" class="input" placeholder="cari produk.." name="search">
								<button class="search-btn">Cari</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->


					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->

							<!-- /Wishlist -->

							<!-- Cart -->

							<!-- /Cart -->


							<!-- Menu Toogle -->
						
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- SECTION -->

	<div class="section">

		<!-- container -->
		<div class="container">


			<!-- row -->
			<div class="row">





			</div>
			<!-- /ASIDE -->

			<!-- STORE -->

			<div id="store" class="center">
				<!-- store top filter -->

				<div class="store-filter clearfix">

					<div class="store-sort">

						<label>
							<form action="/home/sort" method="get">
								<input type="hidden" class="input" placeholder="search here.." name="sort">
								<p> <strong> urutkan :</strong></p>
								<button class="btn btn-secondary btn-sm">Harga tinggi ke rendah</button>
							</form>
						</label>
						<label>
							<form action="/home/sort_asc" method="get">
								<input type="hidden" class="input" placeholder="search here.." name="sort_asc">

								<button class="btn btn-secondary btn-sm">Harga rendah ke tinggi</button>
							</form>
						</label>
						<label>
							<form action="/home/terbaru" method="get">
								<input type="hidden" class="input" placeholder="search here.." name="terbaru">

								<button class="btn btn-secondary btn-sm">produk terbaru</button>
							</form>
						</label>



					</div>


				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<!-- product -->
					@foreach($produk as $p)

					@if ($p->stock == '0')
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="{{asset('storage/produk/' . $p->image)}}" alt="" height="270px">

							</div>
							<div class="product-body">

								<h3 class="product-name"><a href="#">{{ $p->produk }}</a></h3>

								<div class="product-btns">
									<a href="#" class="btn btn-danger">Kosong</a>
									<br>
									<a href="#" class="list-group-item-action bg-transparent second-text  fw-bold" data-target="#produk1" data-toggle="modal"> {{ $p->alamat }}</a>
									<br>
									<a href="#" class="list-group-item-action bg-transparent second-text  fw-bold">Rp {{ $p->harga }}</a>

								</div>
							</div>
						</div>
					</div>


					@else
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="{{asset('storage/produk/' . $p->image)}}" alt="" height="270px">

							</div>
							<div class="product-body">

								<h3 class="product-name">{{ $p->produk }}</h3>

								<div class="product-btns">
									<a href="{{url('detail/'.$p->id)}}" class="btn btn-primary  fw-bold ">Beli</a>
									<span class="">
										<a href="https://wa.me/081280974203"><i style="font-size: 30px; color: green;" class="fab fa-whatsapp "></i> </a>
									</span>



									<br>
									<div class="center">
										<a href="{{url('detail/'.$p->id)}}" class=" list-group-item-action   fw-bold">{{ "Rp ".number_format($p->harga,0,',','.') }}</a>
										<br>

										<a href="{{url('detail/'.$p->id)}}" class=" list-group-item-action bg-transparent   fw-bold" data-target="#produk1" data-toggle="modal">{{ $p->alamat }}</a>
									</div>
									


									<?php
									$progress = (100 / $p->stock);
									$hasil_progress = (int)$progress;
									?>



									<p>
									<div class="progress">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style='width: <?= $hasil_progress ?>%'></div>
									</div>
									</p>
									<div style="font-size: 10px;">
										<p class=" list-group-item-action bg-transparent   fw-bold">{{$p->created_at}} </p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
					<!-- /store products -->

					<!-- store bottom filter -->
					<!-- Halaman : {{ $produk->currentPage() }} <br />
					Jumlah Data : {{ $produk->total() }} <br />
					Data Per Halaman : {{ $produk->perPage() }} <br /> -->


					<div class="container">
						<div class="store-filter clearfix">
							<span class="store-qty"></span>
						
							<ul class="store-pagination">
							
							<div class="mb-3">{{ $produk->links() }}</div>
								<li><a href="/home?page=1" class="">1</a></li>
								<li><a href="/home?page=2">2</a></li>
								<li><a href="/home?page=3">3</a></li>
								<li><a href="/home?page=4">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
								

							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">TENTANG KAMI</h3>
							<p>Tempat investasi property yang aman dan terpercaya</p>

						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">

						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">KONTAK KAMI</h3>
							<ul class="footer-links">
								<ul class="footer-links">
									<li><a href="https://maps.google.com/maps?q=-7.7968708%2C110.4088338&z=17&hl=en"> <i class="fa fa-map-marker"></i>Banguntapan, Modalan, Banguntapan, Bantul Regency, Special Region of Yogyakarta 55198</li></a>
									<li><a href="#"> <i class="fa fa-phone"></i>+021-95-51-84</li></a>
									<li><a href="#"> <i class="far fa-envelope"></i>tuantanah@email.com</li></a>
									<!-- <li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Orders and Returns</a></li>
								<li><a href="#">Terms & Conditions</a></li> -->
								</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Service</h3>
							<ul class="footer-links">
								<li><a href="/user/user_profile">Akun Saya</a></li>
								<!-- <li><a href="#">View Cart</a></li> -->
								<!-- <li><a href="#">Wishlist</a></li> -->
								<li><a href="/user/user_transaksi1">Transaksi</a></li>
								<!-- <li><a href="#">Help</a></li> -->
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://www.twitter.com/"><i class="fab fa-twitter-square"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>