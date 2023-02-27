<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    protected $judul = 'Laporan';
    protected $menu = 'laporan';
    protected $direktori = 'admin.laporan';

    public function index(Request $request){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['laporan'] = Transaksi::with('user')->with('buku')->get();

        if(isset($request->tanggal_awal) && isset($request->tanggal_akhir) && !empty($request->tanggal_awal) && !empty($request->tanggal_akhir)){
            $data['laporan'] = Transaksi::with([
                'user','buku'
            ])->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        }
        
        return view($this->direktori.'.laporan',$data);
    }

    public function print(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['tgl_awal'] = $request->tanggal_awal;
        $data['tgl_akhir'] = $request->tanggal_akhir;

        if(isset($request->tanggal_awal) && isset($request->tanggal_akhir) && !empty($request->tanggal_awal) && !empty($request->tanggal_akhir)){
            $data['laporan'] = Transaksi::with([
                'user','buku'
            ])->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->orderBy('status', 'DESC')->get();
        }else{
            $data['laporan'] = Transaksi::with([
                'user','buku'
            ])->orderBy('created_at', 'DESC')->get();
        }

        return view($this->direktori.'.print',$data);
    }
}
