<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="img/shop/image.png" rel='shortcut icon'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <a class="btn btn-white text-dark" href="/home">Home</a>
                
                <div class=" navbar-" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
            </div>
        </nav>

        {{-- <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}


        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
            <link rel="stylesheet" href="../css/dashboard/dashboardchart/styles.css" />
            <title>Admin Dashboard</title>
        </head>

        <body>
            <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="bg-white" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>Tuan Tanah</div>
                    <div class="list-group list-group-flush my-3">
                        <a href="admin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                        <a href="profile" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold"><i class="fas fa-user-circle me-2"></i> Profile</a>
                        <a href="transaksi" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-money-bill-wave me-2"></i> Transaksi</a>
                        <div class="dropdown ">
                            <button class="btn btn-white   list-group-item list-group-item-action  fw-bold dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-gift me-2"></i> Produk</a>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item btn btn-white   list-group-item list-group-item-action  fw-bold" href="produk">Semua Produk</a></li>
                                <li><a class="dropdown-item btn btn-white   list-group-item list-group-item-action  fw-bold" href="create">Tambah Produk</a></li>

                            </ul>
                        </div>
                       
                        <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off me-2"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                            <h2 class="fs-2 m-0">Tambah Produk</h2>
                            <i class="primary-text breadcrumb  fs-3 me-4" id="menu-toggle"></i>
                            <li class="breadcrumb-item"><a href="upload">Produk</a></li>
                            <li class="breadcrumb-item"><a href="create">Tambah Produk</a></li>

                        </div>

                       


                    </nav>
                    <html>

                    <head>
                        <title>Tambah Produk</title>
                        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
                        <script type="text/javascript" src="js/jquery.js"></script>
                        <script type="text/javascript" src="js/bootstrap.js"></script>
                    </head>

                    <body>

                        <div class="container">

                            <form action="/admin/create" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="produk">Nama Produk:</label>
                                        <input type="text" class="form-control @error('produk') is-invalid @enderror" placeholder="" name="produk">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="jenis">Jenis Produk:</label>
                                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="harga">Harga:</label>
                                        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="stock">Kuota Investor:</label>
                                        <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="alamat">Alamat:</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat">
                                    </div>


                                   

                                    <div class="form-group col-4">
                                        <span class="input-group-text">Deskripsi</span>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" aria-label="With textarea" name="deskripsi"></textarea>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label for="image">Gambar utama</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="image2">Gambar 2</label>
                                            <input type="file" class="form-control @error('image2') is-invalid @enderror" name="image2">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="image3">Gambar 3</label>
                                            <input type="file" class="form-control @error('image3') is-invalid @enderror" name="image3">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="image4">Gambar 4</label>
                                            <input type="file" class="form-control @error('image4') is-invalid @enderror" name="image4">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </body>

                    </html>







                    <!-- /#page-content-wrapper -->
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    var el = document.getElementById("wrapper");
                    var toggleButton = document.getElementById("menu-toggle");

                    toggleButton.onclick = function() {
                        el.classList.toggle("toggled");
                    };
                </script>
        </body>

</html>