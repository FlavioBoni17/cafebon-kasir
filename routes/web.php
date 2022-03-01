<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;



Route::get('/', function () {
    return view('welcome');
});

route::get('laporan-transaksi', [TransaksiController::class, 'index'])->name('laporan-transaksi');
route::get('input-transaksi', [TransaksiController::class, 'inputtransaksi'])->name('input-transaksi');
route::post('simpan-transaksi', [TransaksiController::class, 'simpan_transaksi'])->name('menu-transaksi');
route::post('input-menu-cart', [TransaksiController::class, 'add_menu_to_cart'])->name('menu-cart');
route::get('delete-menu-cart/{row_id}', [TransaksiController::class, 'delete_menu_from_cart'])->name('delete-menu-cart');
route::get('input-menu/{id}', [TransaksiController::class, 'menu_show'])->name('menuInput');
Route::resource('crud-meja', MejaController::class);

route::get('/crud-akun', [AkunController::class, 'index'])->name('crud-akun');
route::get('/create-akun', [AkunController::class, 'createakun'])->name('create-akun');
route::post('/insertdata', [AkunController::class, 'insertdata'])->name('insertdata');
route::get('/showdata/{id}', [AkunController::class, 'showdata'])->name('showdata');
route::post('/updatedata/{id}', [AkunController::class, 'updatedata'])->name('updatedata');
route::get('/delete/{id}', [AkunController::class, 'delete'])->name('delete');

route::get('/crud-menu', [MenuController::class, 'index'])->name('crud-menu');
route::get('/create-menu', [MenuController::class, 'createmenu'])->name('create-menu');
route::post('/insertdatamenu', [MenuController::class, 'insertdatamenu'])->name('insertdatamenu');
route::get('/showdatamenu/{id}', [MenuController::class, 'showdatamenu'])->name('showdatamenu');
route::post('/updatedatamenu/{id}', [MenuController::class, 'updatedatamenu'])->name('updatedatamenu');
route::get('/deletemenu/{id}', [MenuController::class, 'deletemenu'])->name('deletemenu');

//route::get('/crud-meja', [MejaController::class, 'index'])->name('crud-meja');

route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'cekrole:admin,kasir']], function () {
    route::get('/home', [HomeController::class, 'index'])->name('home');
});
