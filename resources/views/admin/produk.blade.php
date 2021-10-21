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
                        <ul class="navbar-nav ml-auto ">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            <title>Admin Dashboard | Produk</title>
        </head>

        <body>

            <div class="d-flex" id="wrapper">
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
                            <h2 class="fs-2 m-0">PRODUK</h2>
                        </div>




                    </nav>

                    <div class="container-fluid px-4">
                        <a type="button" href="create" class="btn btn-primary">
                            +Tambah
                        </a>
                        <div class="row my-2">
                            <div class="col">
                                <table class="table bg-white rounded shadow-sm  table-hover">
                                    <thead>
                                        <tr>
                                            <th width="20">#</th>
                                            <th class="text-center">Produk</th>
                                            <th class="text-center">Jenis</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($produk as $key => $p)
                                    <tr>
                                        <td class="text-center">{{ $p->id }}</td>
                                        <td class="text-center">{{ $p->produk }}</td>
                                        <td class="text-center">{{ $p->jenis }}</td>
                                        <td class="text-center">{{ $p->harga }}</td>
                                        <td class="text-center">{{ $p->stock }}</td>
                                        <td class="text-center">{{ $p->deskripsi }}</td>
                                        <td class="text-center">{{ $p->alamat }}</td>
                                        <!-- <td>{{ $p->image }}</td> -->
                                        <td class="text-center"><img src="{{asset('storage/produk/' . $p->image)}}" alt="" srcset="" width="92" height="54"></td>
                                        <td class="text-center">{{ $p->created_at }}</td>
                                        <td class="text-center">

                                            <button type="button" class="btn btn-warning col-12 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{$key+1}}">
                                                Edit
                                            </button>
                                            <div class="mb-1"></div>
                                            <a href="/admin/produk/hapus/{{ $p->id }}" class="btn btn-danger col-12" onclick="return confirm('lanjutkan hapus produk?')" data-target="" data-toggle="">Delete</a>
                                        </td>
                                        <!-- modal -->
                                        <div class="modal fade" id="exampleModal{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="/admin/produk" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="produk">Nama Produk:</label>
                                                                    <input type="text" class="form-control @error('produk') is-invalid @enderror" value="{{ $p->produk }}" name="produk">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="jenis">Jenis Produk:</label>
                                                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" value="{{ $p->jenis }}" name="jenis">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="harga">Harga:</label>
                                                                    <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{ $p->harga }}" name="harga">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="stock">Kuota Investor:</label>
                                                                    <input type="text" class="form-control @error('stock') is-invalid @enderror" value="{{ $p->stock }}" name="stock">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="alamat">Alamat:</label>
                                                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ $p->alamat }}" name="alamat">
                                                                </div>




                                                                <div class="form-group col-4">
                                                                    <span class="input-group-text">Deskripsi</span>
                                                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" aria-label="With textarea" value="{{ $p->deskripsi }}" name="deskripsi"></textarea>
                                                                </div>

                                                                <br>

                                                                <div class="row">
                                                                    <div class="form-group col-3">
                                                                        <label for="image">Gambar 1</label>
                                                                        <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ $p->image }}" name="image">
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="image2">Gambar 2</label>
                                                                        <input type="file" class="form-control @error('image2') is-invalid @enderror" value="{{ $p->image2 }}" name="image2">
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="image3">Gambar 3</label>
                                                                        <input type="file" class="form-control @error('image3') is-invalid @enderror" value="{{ $p->image3 }}" name="image3">
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="image4">Gambar 4</label>
                                                                        <input type="file" class="form-control @error('image4') is-invalid @enderror" value="{{ $p->image4 }}" name="image4">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" value="{{ $p->id }}" name="id">
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

                                    </tr>
                                    @endforeach
                                </table>




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