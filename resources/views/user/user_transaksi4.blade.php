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
    <!-- pemberitahuan belum upload foto -->
    {{ session()->get('msg'); }}

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
            <title>User Dashboard | Transaksi</title>
        </head>

        <body>
        <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="bg-white" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i> {{ Auth::user()->name }}</div>
                    <div class="list-group list-group-flush my-3">
                        <a href="user" class="list-group-item list-group-item-action  bg-transparent second-text  fw-bold"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="user_profile" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user-circle me-2"></i>Profile</a>
                        <a href="asset" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold"><i class="fas fa-money-bill-wave me-2"></i>Asset</a> 
                        <a href="user_transaksi" class="list-group-item list-group-item-action  fw-bold"><i class="fas fa-shopping-cart me-2"></i>Transaksi</a>
                        <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" href="{{ route('logout') }}" onclick="return confirm('keluar dari akun anda?');
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
                            <h2 class="fs-2 m-0">Transaksi</h2>
                        </div>

                        

                    </nav>



                    <div class="container-fluid px-4">
                        <div class="center">

                            <div class="store-filter clearfix fw-bold">
                                <div class="store-sort">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Status Transaksi
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="user_transaksi">Semua</a></li>
                                            <li><a class="dropdown-item" href="user_transaksi1">Belum dibayar</a></li>
                                            <li><a class="dropdown-item" href="user_transaksi2">Menunggu konfirmasi</a></li>
                                            <li><a class="dropdown-item" href="user_transaksi3">Selesai</a></li>
                                            <li><a class="dropdown-item" href="user_transaksi4">Dijual kembali</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table bg-white rounded shadow-sm  table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Produk</th>
                                            <th class="text-center">Jenis</th>
                                            <th class="text-center">harga</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">tanggal</th>
                                            <th class="text-center">Payment</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($transaksi as $key => $p)
                                    @if ($p->status == 'dijual kembali')

                                    <tr>
                                        <td class="text-center">{{ $p->id }}</td>
                                        <td class="text-center">{{ $p->produk }}</td>
                                        <td class="text-center">{{ $p->jenis }}</td>
                                        <td class="text-center">{{ $p->total }}</td>
                                        <td class="text-center">{{ $p->alamat }}</td>
                                        <td class="text-center">{{ $p->created_at }}</td>
                                        <td class="text-center">{{ $p->payment }}</td>
                                        <td class="text-center">
                                            @if ($p->status == 'selesai')
                                            <span class="badge badge-success">selesai</span>
                                            @elseif ($p->status == 'menunggu konfirmasi')
                                            <span class="badge badge-warning">menunggu konfirmasi</span>
                                            @elseif ($p->status == 'dijual kembali')
                                            <span class="badge badge-secondary">dijual kembali</span>
                                            @else
                                            <span class="badge badge-danger">belum dibayar</span>
                                            @endif
                                        </td>


                                        <td class="text-center">
                                            @if ($p->status == 'belum dibayar')
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$key+1}}">
                                                Konfirmasi
                                            </button>
                                            <div class="mb-1"></div>
                                            <a href="/user/user_transaksi/hapus/{{ $p->id }}" class="btn btn-danger" data-target="" data-toggle="">cancel</a>
                                            <!-- Modal -->

                                            <div class="modal fade" id="exampleModal{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="/user/user_transaksi" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="file" class="form-control" name="bukti_pembayaran">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" value="menunggu konfirmasi" name="status">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" value="{{ $p->id }}" name="id_transaksi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" value="{{ $p->produk }}" name="produk">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            @else
                                            <!-- aksi hilang -->

                                            @endif

                                        </td>
                                    </tr>
                                    @else

                                    @endif
                                    @endforeach
                                </table>
                            </div>




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