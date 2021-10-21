<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat', 'produk.image as image', 'produk.stock as stock')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->where('id_user', Auth::user()->id)->get();

        // $total_asset = DB::table('transaksi')->select(DB::raw('SUM(total) as total_asset'))->where('status', '=', 'selesai')->where('id_user', '=', Auth::user()->id)->get();
        $total_asset = DB::table('transaksi')->where('status', '=', 'selesai')->where('id_user', '=', Auth::user()->id)->SUM('total');

         return view('/user/asset', ['transaksi' => $transaksi, 'total_asset' => $total_asset]);
        // $upload = DB::table('upload')->get();

        // return view('/user/asset', ['upload' => $upload]);
    }
    
    public function modal(Request $request)
    {
        
        $id_produk = DB::table('produk')->select('id')->where('produk', '=', $request->produk)->get();
         //nambah stock
        $stock = DB::table('produk')->select('produk.stock')->where('id', $id_produk[0]->id)->first();
        $stock->stock += 1;
        // return $stock;

        $stock = DB::table('produk')->where('id', $id_produk[0]->id)->update(['stock' => $stock->stock]);

        $transaksi = DB::table('transaksi')->where('id', $request->id_transaksi);
        
        $transaksi->update([
            'status' => 'dijual kembali'
            
        ]);

         return redirect('/user/asset');

       
    }
}

//buat di balde asset
// <input type="text" class="form-control" value="{{ $p->id }}" name="id">
                                        
// <input type="text" class="form-control" value="{{ $p->stock }}" name="stock">




