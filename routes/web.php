<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PenggunaController::class,'index'])->name('userpages');
Route::get('/user-pages', [PenggunaController::class,'index'])->name('userpages');
Route::get('/detail/{judul}', [PenggunaController::class, 'show'])->name('detail');
Route::post('/addrak', [PenggunaController::class, 'store'])->name('addrak');
Route::post('/drop/{id}', [PenggunaController::class, 'drop'])->name('drop');
Route::get('/baca/{pdf_file}', [PenggunaController::class, 'baca'])->name('baca');
Route::post('/pinjam', [PenggunaController::class, 'peminjaman'])->name('Pinjam');
Route::get('/history_pinjam', [PenggunaController::class, 'pinjam'])->name('history');
Route::get('/pembatalantransaksi/{id}', [PenggunaController::class, 'batal'])->name('bataltransaksi');
Route::get('/rak', [PenggunaController::class, 'rak'])->name('rak');
Route::get('/kategori/{kategori:nama_kategori}', [PenggunaController::class, 'kategori']);
Route::get('/search', [PenggunaController::class, 'cari'])->name('search');

Route::group(['middleware' => 'admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/anggota',[UserController::class,'index'])->name('user');
    Route::get('/create-anggota',[UserController::class,'create'])->name('createuser');
    Route::post('/store-anggota',[UserController::class,'store'])->name('userstore');
    Route::get('/show/{id}',[UserController::class,'show'])->name('usershow');
    Route::get('/edit-anggota/{id}',[UserController::class,'edit'])->name('edituser');
    Route::post('/update-anggota/{id}',[UserController::class,'update'])->name('userupdate');
    Route::delete('/delete-anggota/{id}',[UserController::class,'delete']);
    
    Route::get('/buku',[BukuController::class,'index'])->name('buku');
    Route::get('/create-buku',[BukuController::class,'create'])->name('createbuku');
    Route::post('/store-buku',[BukuController::class,'store'])->name('bukustore');
    Route::get('/show/{id}',[BukuController::class,'show'])->name('bukushow');
    Route::get('/edit-buku/{id}',[BukuController::class,'edit'])->name('editbuku');
    Route::post('/update-buku/{id}',[BukuController::class,'update'])->name('bukuupdate');
    Route::delete('/delete-buku/{id}',[BukuController::class,'delete']);

    Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');
    Route::get('/create-kategori',[KategoriController::class,'create'])->name('createkategori');
    Route::post('/store-kategori',[KategoriController::class,'store'])->name('kategoristore');
    Route::get('/show/{id}',[KategoriController::class,'show'])->name('kategorishow');
    Route::get('/edit-kategori/{id}',[KategoriController::class,'edit'])->name('editkategori');
    Route::post('/update-kategori/{id}',[KategoriController::class,'update'])->name('kategoriupdate');
    Route::delete('/delete-kategori/{id}',[KategoriController::class,'delete']);
    
    Route::get('/transaksi',[TransaksiController::class,'index'])->name('transaksi');
    Route::get('/create-transaksi',[TransaksiController::class,'create'])->name('createtransaksi');
    Route::post('/store-transaksi',[TransaksiController::class,'store'])->name('transaksistore');
    Route::get('/show/{id}',[TransaksiController::class,'show'])->name('transaksishow');
    Route::get('/edit-transaksi/{id}',[TransaksiController::class,'edit'])->name('edittransaksi');
    Route::post('/update-transaksi/{id}',[TransaksiController::class,'update'])->name('transaksiupdate');
    Route::delete('/delete-transaksi/{id}',[TransaksiController::class,'delete']);
    Route::get('/peminjaman/{id}',[TransaksiController::class,'pinjam'])->name('pinjam');
    Route::get('/pembatalan/{id}',[TransaksiController::class,'batal'])->name('batal');
    Route::get('/pengembalian/{id}',[TransaksiController::class,'kembali'])->name('kembali');

    Route::get('/laporan',[LaporanController::class,'index'])->name('laporan');
    Route::get('/print', [LaporanController::class, 'print'])->name('laporanPrint');

});


Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/post-login', [LoginController::class, 'authenticate'])->name('loginPost');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registrasi', [LoginController::class, 'regis'])->name('regis');
Route::post('/post-regis', [LoginController::class, 'postregis'])->name('regispost');