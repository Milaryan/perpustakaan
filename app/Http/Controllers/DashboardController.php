<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $judul = 'Dashboard';
    protected $menu = 'dashboard';
    protected $direktori = 'admin';

    public function index(){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['user'] = User::count();
        $data['buku'] = Buku::count();
        $data['kategori'] = Kategori::count();
        $data['pending'] = Transaksi::where('status', 'Pending')->count();
        $data['pinjam'] = Transaksi::where('status', 'Pinjam')->count();
        $data['kembali'] = Transaksi::where('status', 'Kembali')->count();
        
        return view($this->direktori.'.dashboard',$data);
    }
}
