<?php



use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;

use App\Http\Controllers\DetailController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\User_transaksiController;
use App\Http\Controllers\User_profileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetdetailController;
use App\Http\Controllers\DatauserController;


use Illuminate\Support\Facades\Route;

//BELUM JADI
// Route::get('/verify', [ResetpasswordController::class, 'index']);
// Route::get('/forgotpassword', [ResetpasswordController::class, 'index']);
//BELUM JADI
// Route::get('/upload/delete{id}', [UploadController::class, 'delete']);




// login
route::auth();
Route::get('/auth/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
// register
Route::get('/auth/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//bisa diakses bebas
Route::get('/detail/{id}', [DetailController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/search', [HomeController::class, 'search']);
Route::get('/home/sort', [HomeController::class, 'sort']);
Route::get('/home/sort_asc', [HomeController::class, 'sort_asc']);
Route::get('/home/terbaru', [HomeController::class, 'terbaru']);
Route::get('/panduan', function () {
    return view('panduan');
                });          







route::prefix('admin')
->middleware(['auth','ceklevel:admin'])
->group(function (){
//nampilin view upload | menampilkan data dari database ke view upload
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/hapus/{id}', [ProdukController::class, 'hapus']);
Route::post('/produk', [ProdukController::class, 'modal']);
//nampilin create | insert data ke database
Route::get('/create', [ProdukController::class, 'create']);
Route::post('/create', [ProdukController::class, 'store']);
//transaksi admin
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/transaksi/hapus/{id}', [TransaksiController::class, 'hapus']);
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'update']);
//transaksi admin menunggu konfirmasi
Route::get('/transaksi2', [TransaksiController::class, 'index2']);
Route::post('/transaksi2', [TransaksiController::class, 'store']);
Route::get('/transaksi2/hapus/{id}', [TransaksiController::class, 'hapus']);
Route::get('/transaksi2/edit/{id}', [TransaksiController::class, 'update']);
//transaksi admin selesai
Route::get('/transaksi3', [TransaksiController::class, 'index3']);
Route::post('/transaksi3', [TransaksiController::class, 'store']);
Route::get('/transaksi3/hapus/{id}', [TransaksiController::class, 'hapus']);
Route::get('/transaksi3/edit/{id}', [TransaksiController::class, 'update']);
//transaksi admin dijual kembali oleh user
Route::get('/transaksi4', [TransaksiController::class, 'index4']);
Route::post('/transaksi4', [TransaksiController::class, 'store']);
Route::get('/transaksi4/hapus/{id}', [TransaksiController::class, 'hapus']);
Route::get('/transaksi4/edit/{id}', [TransaksiController::class, 'update']);
//transaksi-semua
Route::get('/transaksi-semua', [TransaksiController::class, 'index5']);
Route::post('/transaksi-semua', [TransaksiController::class, 'store']);
Route::get('/transaksi-semua/hapus/{id}', [TransaksiController::class, 'hapus']);
Route::get('/transaksi-semua/edit/{id}', [TransaksiController::class, 'update']);
//transaksi admin selesai
Route::get('/admin', [AdminController::class, 'index']);
Route::get('profile', [profileController::class, 'index_admin']);
Route::get('/create_profile', [ProfileController::class, 'create_admin']);
Route::post('/create_profile', [ProfileController::class, 'update_admin']);

Route::get('/data_user', [DatauserController::class, 'index']);
});

route::prefix('user')
->middleware(['auth','ceklevel:user'])
->group(function (){

//user transaksi semua
Route::get('/user_transaksi', [User_transaksiController::class, 'index']);
Route::get('/user_transaksi/hapus/{id}', [User_transaksiController::class, 'hapus']);
Route::get('/user_transaksi/edit/{id}', [User_transaksiController::class, 'update']);
Route::post('/user_transaksi', [User_transaksiController::class, 'modal']);
//user transaksi belum dibayar
Route::get('/user_transaksi1', [User_transaksiController::class, 'index1']);
Route::get('/user_transaksi1/hapus/{id}', [User_transaksiController::class, 'hapus']);
Route::get('/user_transaksi1/edit/{id}', [User_transaksiController::class, 'update']);
Route::post('/user_transaksi1', [User_transaksiController::class, 'modal']);
//user transaksi belum dibayar
Route::get('/user_transaksi2', [User_transaksiController::class, 'index2']);
Route::get('/user_transaksi2/hapus/{id}', [User_transaksiController::class, 'hapus']);
Route::get('/user_transaksi2/edit/{id}', [User_transaksiController::class, 'update']);
Route::post('/user_transaksi2', [User_transaksiController::class, 'modal']);
//user transaksi belum dibayar
Route::get('/user_transaksi3', [User_transaksiController::class, 'index3']);
Route::get('/user_transaksi3/hapus/{id}', [User_transaksiController::class, 'hapus']);
Route::get('/user_transaksi3/edit/{id}', [User_transaksiController::class, 'update']);
Route::post('/user_transaksi3', [User_transaksiController::class, 'modal']);
//user transaksi belum dibayar
Route::get('/user_transaksi4', [User_transaksiController::class, 'index4']);
Route::get('/user_transaksi4/hapus/{id}', [User_transaksiController::class, 'hapus']);
Route::get('/user_transaksi4/edit/{id}', [User_transaksiController::class, 'update']);
Route::post('/user_transaksi4', [User_transaksiController::class, 'modal']);
//transaksi-semua
// Route::get('/user_transaksi', [User_transaksiController::class, 'payment']);
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);

Route::get('/asset', [AssetController::class, 'index']);
Route::post('/asset', [AssetController::class, 'modal']);
Route::post('/asset', [AssetController::class, 'update_asset']);
// Route::get('/asset/edit/{id}', [User_transaksiController::class, 'update']);
Route::get('user_profile', [profileController::class, 'index']);
Route::get('/user_create_profile', [ProfileController::class, 'create']);
Route::post('/user_create_profile', [ProfileController::class, 'update']);
Route::get('/assetdetail/{id}', [AssetdetailController::class, 'index']);       
Route::post('/assetdetail/{id}', [AssetdetailController::class, 'update']);   
  
});


route::middleware(['auth','ceklevel:user,admin'])
->group(function (){
Route::get('/checkout/{id}', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);
});









// route::auth();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
