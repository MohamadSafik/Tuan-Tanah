<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProfileController extends Controller
{   //users
    public function index()
    {
        // mengambil data dari table pegawai
        $users = DB::table('users')->get();

        // mengirim data pegawai ke view index
        return view('user.user_profile', ['profile' => $users]);
    }
    public function create()
    {
        // mengambil data dari table pegawai
        $users = DB::table('users')->get();

        // mengirim data pegawai ke view index
        return view('user.user_create_profile', ['users' => $users]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'no_hp' => 'required',
            'alamat' => 'required',
            'image' => 'required',
            'no_rek' => 'required'
        ]);

        $image = $request->file('image');

        $image->storeAs('public/users', $image->hashName());

        $users = DB::table('users')->where('id', $request->id);

        $users->update([

            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'image' => $image->hashName(),
            'no_rek' =>  $request->no_rek,
        ]);

        return redirect('/user/user_profile')->with('status', 'Data Buku Berhasil Ditambahkan');
    }

    //admin
    public function index_admin()
    {
        // mengambil data dari table pegawai
        $users = DB::table('users')->get();

        // mengirim data pegawai ke view index
        return view('admin.profile', ['profile' => $users]);
    }
    public function create_admin()
    {
        // mengambil data dari table pegawai
        $users = DB::table('users')->get();

        // mengirim data pegawai ke view index
        return view('admin.create_profile', ['users' => $users]);
    }

    public function update_admin(Request $request)
    {
        $this->validate($request, [
            'no_hp' => 'required',
            'alamat' => 'required',
            'image' => 'required'
            
        ]);
        
        $image = $request->file('image');

        $image->storeAs('public/users', $image->hashName());

        $users = DB::table('users')->where('id', $request->id);

        $users->update([

            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'image' => $image->hashName(),
           
        ]);

        return redirect('/admin/profile')->with('status', 'Data Buku Berhasil Ditambahkan');
    }
}
