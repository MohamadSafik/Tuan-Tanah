<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
       
        $hitung_menunggu_pembayaran = DB::table('transaksi')->where('status', '=', 'belum dibayar')->count();
        $hitung_menunggu_konfirmasi = DB::table('transaksi')->where('status', '=', 'menunggu konfirmasi')->count();
        $hitung_pesanan_selesai = DB::table('transaksi')->where('status', '=', 'selesai')->count();
        $total_asset = DB::table('transaksi')->select(DB::raw('SUM(total) as total_asset'))->where('status', '=', 'selesai')->where('id_user', '=', Auth::user()->id)->get();

        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat', 'produk.image as image', 'produk.stock as stock')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->where('id_user', Auth::user()->id)->get();

      



        return view('user.user', ['transaksi' => $transaksi, 'total_asset' => $total_asset, 'hitung_menunggu_pembayaran' => $hitung_menunggu_pembayaran, 'hitung_menunggu_konfirmasi' => $hitung_menunggu_konfirmasi, 'hitung_pesanan_selesai' => $hitung_pesanan_selesai]);
    }
}
