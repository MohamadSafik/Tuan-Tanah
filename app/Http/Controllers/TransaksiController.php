<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->latest()
        ->get();

        //mengirim data pegawai ke view index
    	return view('admin.transaksi',['transaksi' => $transaksi]);  
       
    }
    public function index2()
    {
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->latest()
        ->get();

    	//mengirim data pegawai ke view index 
        return view('admin.transaksi2',['transaksi' => $transaksi]);    
    }
    public function index3()
    {
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk', 'produk.jenis as jenis',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->latest()
        ->get();

        //mengirim data pegawai ke view index 
        return view('admin.transaksi3',['transaksi' => $transaksi]);    
    }
    public function index4()
    {
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->latest()
        ->get();

    	//mengirim data pegawai ke view index 
        return view('admin.transaksi4',['transaksi' => $transaksi]);    
    }
    public function index5()
    {
        $transaksi = DB::table('transaksi')
        ->select('transaksi.*', 'produk.produk as produk',  'produk.alamat as alamat')
        ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
        ->latest()
        ->get();

    	//mengirim data pegawai ke view index 
        return view('admin.transaksi-semua',['transaksi' => $transaksi]);    
    }

    public function store(Request $request)
    {

        $transaksi = DB::table('transaksi')->where('id', $request->id);

        $transaksi->update([

            'status' => 'selesai',
            'waktu_roi' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/admin/transaksi')->with('status', 'Data Buku Berhasil Ditambahkan');
    }
    

   
   







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

      
    public function hapus($id) {
        DB::table('checkout')->where('id', $id)->delete();
        
        return redirect('/admin/transaksi')->with('success','berhasil di hapus');
      }
   

}
