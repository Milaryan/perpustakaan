<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $judul = 'Data Kategori';
    protected $menu = 'data-kategori';
    protected $direktori = 'admin/crud_kategori';

    public function index(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;        
        $data['kategori'] = Kategori::with(['buku'])->get();

        if(isset($request->kategori)){
            $data['kategori'] = Kategori::with([
                'buku'
            ])->where('nama_kategori','like',"%".$request->kategori."%")->get();
        }

        return view($this->direktori.'.home',$data);
    }

    public function create()
    {
        $data['judul'] = 'Tambah Kategori';
        $data['menu'] = $this->menu;        

        return view($this->direktori.'.add',$data);
    }

    public function store(Request $request)
    {
        try{
            // dd($request);
            if (Kategori::where('nama_kategori', $request->nama_kategori)->first()) {
                return redirect()->back()->with('status', 'error')->with('message', 'Kategori Sudah Ada');
            }
            $validate = $request->validate([
                'nama_kategori' => 'required',
            ]);
    
            Kategori::create($validate);
            return redirect()->route('kategori')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
        }
        catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'nama_kategori' => 'required',
            ]);
            
            $kategori = Kategori::where('id_kategori', $id)->first();
    
            $kategori->update($validate);

            return redirect()->route('kategori')->with('status', 'success')->with('message', 'Berhasil diupdate');
        }
        catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function delete($id)
    {
        // dd($kat);
        $kat = Kategori::where('id_kategori',$id)->first();
        if (!empty($kat)) {
            $kat->delete();

            return redirect()->route('kategori')->with('status', 'success')->with('message', 'Berhasil Dihapus');
        }
        return redirect()->route('kategori')->with('status', 'error')->with('message', 'Gagal Dihapus');
    }
}
