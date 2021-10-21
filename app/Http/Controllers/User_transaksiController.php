<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class User_transaksiController extends Controller
{
    public function index()
    {
        // mengambil data dari table pegawai
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->where('id_user', Auth::user()->id)
        ->latest()
        ->get();

        // mengirim data pegawai ke view index
        return view('user.user_transaksi', ['transaksi' => $transaksi]);
    }
    public function index1()
    {
        // mengambil data dari table pegawai
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->where('id_user', Auth::user()->id)
        ->latest()
        ->get();

        // mengirim data pegawai ke view index
        return view('user.user_transaksi1', ['transaksi' => $transaksi]);
    }
    public function index2()
    {
        // mengambil data dari table pegawai
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->where('id_user', Auth::user()->id)
        ->latest()
        ->get();

        // mengirim data pegawai ke view index
        return view('user.user_transaksi2', ['transaksi' => $transaksi]);
    }

    public function index3()
    {
        // mengambil data dari table pegawai
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->where('id_user', Auth::user()->id)
        ->latest()
        ->get();

        // mengirim data pegawai ke view index
        return view('user.user_transaksi3', ['transaksi' => $transaksi]);
    }
    public function index4()
    {
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->where('id_user', Auth::user()->id)
        ->latest()
        ->get();

        return view('user.user_transaksi4', ['transaksi' => $transaksi]);
    }



    public function modal(Request $request)
    {

        if ($request->bukti_pembayaran == null) {
            return redirect()->back()->with('msg', 'Harap upload foto terlebih dahulu');
        }

        $id_produk = DB::table('produk')->select('id')->where('produk', '=', $request->produk)->get();

        
       
        //ngurangin stock
        $stock = DB::table('produk')->select('produk.stock')->where('id', $id_produk[0]->id)->first();
        $stock->stock -= 1;
        // return $stock;

        $stock = DB::table('produk')->where('id', $id_produk[0]->id)->update(['stock' => $stock->stock]);
        // DB::table('upload') -> update([

        //     '$stockstock' => $request -> id,
        // ]);

        //insert ke database
        $bukti_pembayaran = $request->file('bukti_pembayaran');

        $bukti_pembayaran->storeAs('public/transaksi', $bukti_pembayaran->hashName());
        
        // dd($bukti_pembayaran->hashName());
        $transaksi = DB::table('transaksi')->where('id', $request->id_transaksi);
        
        $transaksi->update([
            'bukti_pembayaran' => $bukti_pembayaran->hashName(),
            'status' => 'menunggu konfirmasi',
            'updated_at' => Carbon::now()
        ]);
        // status transaksi
        // $transaksi = DB::table('transaksi')->where('id', $request->id_transaksi);

        // $transaksi->update([

           
        // ]);

        return redirect('/user/user_transaksi')->with('status', 'Data Buku Berhasil Ditambahkan');
    }

    public function hapus($id)
    {
        DB::table('transaksi')->where('id', $id)->delete();

        return redirect('/user/user_transaksi');
    }
}
