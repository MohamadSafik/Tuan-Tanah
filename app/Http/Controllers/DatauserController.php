<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DatauserController extends Controller
{
    public function index()
    {
        // mengambil data dari table pegawai
        $users= DB::table('users')->get();

        // mengirim data pegawai ke view index
        return view('admin.data_user', ['users' => $users]);
    }
}
