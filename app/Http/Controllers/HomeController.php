<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use livewire\Component;
use livewire\WithPagination;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // mengambil data dari table pegawai
        $produk = DB::table('produk')
            ->paginate(6);

        // mengirim data pegawai ke view index
        return view('home', [
            'produk' => $produk
        ]);
    }

    public function search(Request $request)
    {
        //menangkap data pencarian
        $search = $request->search;
        //mengambil data dari table upload
        $produk = DB::table('produk')
            ->where('produk', 'like', "%" . $search . "%")
            ->orWhere('alamat', 'like', "%" . $search . "%")
            ->orWhere('harga', 'like', "%" . $search . "%")
            ->paginate(6);

        return view('home', ['produk' => $produk]);
        // return redirect()->back();
    }

    public function sort()
    {


        $produk = DB::table('produk')
            ->orderBy('harga', 'desc')
            ->paginate(6);

        return view('home', ['produk' => $produk]);
    }
    public function sort_asc()
    {


        $produk = DB::table('produk')
            ->orderBy('harga', 'asc')
            ->paginate(6);

        return view('home', ['produk' => $produk]);
    }
    public function terbaru()
    {


        $produk = DB::table('produk')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('home', ['produk' => $produk]);
    }
}
