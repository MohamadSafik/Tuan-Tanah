<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($id)
    {
      // mengambil data dari table pegawai
    	$produk = DB::table('produk')->where('id',$id)->get();

    	// mengirim data pegawai ke view index
    	return view('admin.detail',['produk' => $produk]);
    }
}


