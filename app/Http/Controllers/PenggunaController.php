<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak_User;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class PenggunaController extends Controller
{
    protected $judul = 'Perpustakaan Online | Selamat Datang';
    protected $menu = 'home';
    protected $direktori = 'user';

    public function index(){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['kategori'] = Kategori::all();
        $data['buku'] = Buku::take(6)->orderBy('created_at', 'DESC')->get();
        // $data['rak'] = Rak_User::with('buku')->latest()->get();
        
        return view($this->direktori.'.home',$data);
    }
    
    public function cari(Request $request){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['kategori'] = Kategori::all();
        // $data['buku'] = Buku::take(6)->orderBy('created_at', 'DESC')->get();
        // $data['rak'] = Rak_User::with('buku')->latest()->get();

        if(isset($request->search)){
            $data['buku'] = Buku::where('judul','like',"%".$request->search."%")->get();
        }
        
        return view($this->direktori.'.search',$data);
    }

    public function store(Request $request){
        try {
            if (Auth::check()) {
                $rak = Rak_User::where('buku_id', $request->buku_id)->where('user_id', Auth::user()->id_user)->first();

                if ($rak) {
                    return redirect()->route('userpages')->with('status', 'error')->with('message', 'Buku Sudah Ada di Rak');
                }else {
                    $validate['buku_id'] = $request->buku_id;
                    $validate['user_id'] = Auth::user()->id_user;
        
                    Rak_User::create($validate);
                    return redirect()->route('userpages')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
                }
            } else {
                return redirect()->back()->with('status', 'error')->with('message', 'Silahkan Login Terlebih Dahulu');
            }

        } catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function show(Request $request, $judul)
    {
        $data['judul'] = $this->judul;
        $data['kategori'] = Kategori::all();
        $data['buku'] = Buku::where('judul', $judul)->with('kategori_buku')->first();
        $data['rak'] = Rak_User::with('buku')->latest()->get();

        return view($this->direktori.'.detail', $data);
    }

    public function drop($id)
    {
        $rak = Rak_User::where('id_rak', $id)->first();
        if(!empty($rak)){
            $rak->delete();

            return redirect()->back()->with('status', 'success')->with('message', 'Berhasil Dihapus');
        }else{
            return redirect()->back()->with('status', 'error')->with('message', 'Gagal Dihapus');
        }
    }

    public function baca($pdf_file)
    {
        $data['judul'] = $this->judul;
        $data['pdf_file'] = $pdf_file;

        return view($this->direktori.'.baca', $data);
    }

    public function pinjam()
    {
        $data['judul'] = $this->judul;
        $data['kategori'] = Kategori::all();
        $data['rak'] = Rak_User::with('buku')->latest()->get();
        $data['trans'] = Transaksi::with('buku')->with('user')->where('user_id', Auth::user()->id_user)->latest()->get();

        return view($this->direktori.'.pinjam', $data);
    }

    public function peminjaman(Request $request)
    {
        try{
            if (Auth::check()) {
                $buku = Buku::where('id_buku', $request->buku_id)->first();
                $pinjam = Transaksi::where('user_id', Auth::user()->id_user)->where('buku_id', $request->buku_id)->first();
                // dd($pinjam);
                
                if ($pinjam) {
                    if ($pinjam->status == 'Pinjam') {
                        return redirect()->back()->with('status', 'error')->with('message', 'Buku Masih di Pinjam');
                    }elseif ($pinjam->status == 'Pending') {
                        return redirect()->back()->with('status', 'error')->with('message', 'Peminjaman Masih di Pending');
                    }else {
                        if ($buku->stok > 0) {
                            $validate = $request->validate([
                                'user_id' => 'required',
                                'buku_id' => 'required',
                                'tgl_pinjam' => 'required',
                                'bts_kembali' => 'required',
                                'status' => 'required'
                            ]);
                            
                            $validate['tgl_kembali'] = '-';
                            $validate['kode_transaksi'] = "TR-".date('dhms');
                            $validate['denda'] = '0';
                    
                            Transaksi::create($validate);
                            return redirect()->route('history')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
                        } else {
                            return redirect()->back()->with('status', 'error')->with('message', 'Stok Tidak Tersedia');
                        }
                    }
                } else {
                    if ($buku->stok > 0) {
                        $validate = $request->validate([
                            'user_id' => 'required',
                            'buku_id' => 'required',
                            'tgl_pinjam' => 'required',
                            'bts_kembali' => 'required',
                            'status' => 'required'
                        ]);
                        
                        $validate['tgl_kembali'] = '-';
                        $validate['kode_transaksi'] = "TR-".date('dhms');
                        $validate['denda'] = '0';
                
                        Transaksi::create($validate);
                        return redirect()->route('history')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
                    } else {
                        return redirect()->back()->with('status', 'error')->with('message', 'Stok Tidak Tersedia');
                    }
                }
            } else {
                return redirect()->back()->with('status', 'error')->with('message', 'Silahkan Login Terlebih Dahulu');
            }
        }
        catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function kategori($kategori)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['kategori'] = Kategori::all();
        $data['getkategori'] = Kategori::where('nama_kategori', $kategori)->orderby('nama_kategori', 'ASC')->get();

        return view($this->direktori.'.kategori',$data);
    }

    public function batal($id){
        $transaksi = Transaksi::where('kode_transaksi', $id)->first();
        $transaksi->status = 'Batal';

        $transaksi->update();
        return redirect()->route('history')->with('status', 'success')->with('message', 'Berhasil di-batalkan');
    }
}
