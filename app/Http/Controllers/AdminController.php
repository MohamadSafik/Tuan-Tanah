<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
        $this->middleware('auth');

    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
       $jumlah_produk = DB::table('produk')->count();
       $produk_dibayar = DB::table('transaksi')->where('status','=','menunggu konfirmasi')->count();
      
       $hitung_pesanan_selesai = DB::table('transaksi')->where('status','=','selesai')->count();

      
       return view('admin.admin', ['jumlah_produk' => $jumlah_produk, 'produk_dibayar' => $produk_dibayar, 'hitung_pesanan_selesai' => $hitung_pesanan_selesai]);
    }
       
    

}
