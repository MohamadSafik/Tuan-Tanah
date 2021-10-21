<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index($id)
    {
       // mengambil data dari table pegawai
    	$produk = DB::table('produk')->where('id',$id)->get();

    	// mengirim data pegawai ke view index
    	return view('checkout.checkout',['produk' => $produk]);
    }


    public function store(Request $request)
    {
         $this -> validate($request, [
           
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'address' => 'required',
           
            
        ]);

        // insert data ke table checkout
        DB::table('transaksi') -> insert([
            'id_user'=> Auth::user()->id,
            'id_produk' => $request -> id,
            'total' => $request -> total,
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name,
            'no_hp' => $request -> no_hp,
            'email' => $request -> email,
            'address' => $request -> address,
            'payment' => $request -> payment,
            'status' => $request -> status,
            'created_at' => Carbon::now()

        ]);
        // alihkan halaman tambah buku ke halaman books
        // return redirect ('/upload');
        return redirect('/user/user_transaksi') -> with('status', 'Data Barang Berhasil Ditambahkan');
    }
   
    

}


