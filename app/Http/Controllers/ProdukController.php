<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;

class ProdukController extends Controller
{

    public function index()
    {
        // mengambil data dari table pegawai
        $produk = DB::table('produk')

        ->select('produk.*', 'transaksi.transaksi as transaksi', 'transaksi.status as status')
        ->join('transaksi', 'produk.id_transaksi', '=', 'transaksi.id')
        
        ->get();

        // mengirim data pegawai ke view index
        return view('admin.produk', ['produk' => $produk]);
    }
    public function create()
    {
        // memanggil view create
        return view('/admin/create');
    }

    public function store(Request $request)
    {
        //untuk validasi form
        $this -> validate($request, [
            'produk' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'estimasi_roi' => 'required',
            'alamat' => 'required',
            'image' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/produk', $image->hashName());
        $image2 = $request->file('image2');
        $image2->storeAs('public/produk', $image2->hashName());
        $image3 = $request->file('image3');
        $image3->storeAs('public/produk', $image3->hashName());
        $image4 = $request->file('image4');
        $image4->storeAs('public/produk', $image4->hashName());

        // insert data ke table upload
        DB::table('produk')->insert([
            'produk' => $request->produk,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'deskripsi' => $request->deskripsi,
            'estimasi_roi' => $request->estimasi_roi,
            'alamat' => $request->alamat,
            'image' => $image->hashName(),
            'image2' => $image2->hashName(),
            'image3' => $image3->hashName(),
            'image4' => $image4->hashName(),
            'created_at' => Carbon::now()
        ]);

        return redirect('/admin/produk')->with('status', 'Data Buku Berhasil Ditambahkan');
    }

    public function hapus($id)
    {
        DB::table('produk')->where('id', $id)->delete();

        return redirect('/admin/produk');
    }



    //update produk

    public function modal(Request $request)
    {
        //untuk validasi form
        // $this -> validate($request, [
        //     'produk' => 'required',
        //     'jenis' => 'required',
        //     'harga' => 'required',
        //     'stock' => 'required',
        //     'deskripsi' => 'required',
        //     'estimasi_roi' => 'required',
        //     'alamat' => 'required',
        //     'image' => 'required',
        //     'image2' => 'required',
        //     'image3' => 'required',
        //     'image4' => 'required'
        // ]);
        // $produk = DB::table('produk')->where('id', $request->id);

        $image = $request->file('image');
        $image->storeAs('public/produk', $image->hashName());
        $image2 = $request->file('image2');
        $image2->storeAs('public/produk', $image2->hashName());
        $image3 = $request->file('image3');
        $image3->storeAs('public/produk', $image3->hashName());
        $image4 = $request->file('image4');
        $image4->storeAs('public/produk', $image4->hashName());
        // insert data ke table upload

        DB::table('produk')->where('id', $request->id)
        ->update([
            'produk' => $request->produk,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'image' => $image->hashName(),
            'image2' => $image2->hashName(),
            'image3' => $image3->hashName(),
            'image4' => $image4->hashName(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/admin/produk')->with('status', 'Data Buku Berhasil Ditambahkan');
    }
    
}
