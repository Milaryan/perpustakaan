<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Detail_Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    protected $judul = 'Data Buku';
    protected $menu = 'data-buku';
    protected $direktori = 'admin.crud_buku';

    public function index(Request $request){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['buku'] = Buku::with(['kategori_buku'])->orderBy('created_at', 'DESC')->get();
        $data['kategori'] = Kategori::all();

        if(isset($request->judul)){
            $data['buku'] = Buku::with([
                'kategori_buku'
            ])->where('judul','like',"%".$request->judul."%")->get();
        }
        
        return view($this->direktori.'.home',$data);
    }

    public function create(){
        $data['judul'] = 'Tambah Buku';
        $data['menu'] = $this->menu;
        $data['kategori'] = Kategori::all();

        return view($this->direktori.'.add',$data);
    }

    public function store(Request $request){
        try{
            if (Buku::where('judul', $request->judul)->first()) {
                return back()->withInput()->with('status', 'error')->with('message', 'Buku Sudah Ada !');
            }
            else {
                $validate = $request->validate([
                    'judul' => 'required',
                    'sampul'=> 'required|mimes:jpeg,png,jpg',
                    'pdf_file' => 'mimes:pdf,doc',
                    'kategori_id' => 'required',
                    'pengarang' => 'required',
                    'penerbit' => 'required',
                    'sinopsis' => '',
                    'thn_terbit' => 'required',
                    'stok' => 'required'
                ]);
    
                //sampul
                $nama_foto = str_replace(['','/'],'-', $request->judul);
                $ext_foto   = $request->sampul->getClientOriginalExtension();
                $fotoname   = $nama_foto ."-". date('Ymdhis') .".". $ext_foto;
                $tmp_foto   = 'img/sampul';
                $proses     = $request->sampul->move($tmp_foto,$fotoname);
                //pdf_file
                if ($request->pdf_file != NULL) {
                    $nama_file = str_replace(['','/'],'-', $request->judul);
                    $ext_file  = $request->pdf_file->getClientOriginalExtension();
                    $filename   = $nama_file ."-". date('Ymdhis') .".". $ext_file;
                    $tmp_file  = 'file';
                    $proses     = $request->pdf_file->move($tmp_file,$filename);
                    $validate['pdf_file'] = $filename;
                } else {
                    $validate['pdf_file'] = '';
                }
                
                
                if ($request->sinopsis) {
                    $validate['sinopsis'] = $request->sinopsis;
                }else{
                    $validate['sinopsis'] = 'Tidak Ada Keterangan';
                }
                $validate['sampul'] = $fotoname;
        
                Buku::create($validate);
                return redirect()->route('buku')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
            }
        }
        catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function show($id)
    {
        $data['user'] = Buku::where('id_buku', $id)->first();

        return view($this->direktori.'.show',$data);
    }
    
    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        $data['menu'] = $this->menu;

        $data['user'] = Buku::where('id_buku', $id)->first();

        return view($this->direktori.'.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'judul' => 'required',
                'sampul'=> 'mimes:jpeg,jpg,png',
                'pdf_file' => 'mimes:pdf,doc',
                'kategori_id' => 'required',
                'pengarang' => 'required',
                'penerbit' => 'required',
                'sinopsis' => '',
                'thn_terbit' => 'required',
                'stok' => 'required'
            ]);
            
            $buku = Buku::where('id_buku', $id)->first();

            if(isset($request->sampul)){
                if (!empty($request->sampul) && $request->sampul != NULL) {
                    if (!empty($buku) && $buku->sampul != NULL) {
                        $path = 'img/sampul/' . $buku->sampul;
                        if(file_exists($path)){
                            unlink($path);
                        }
                    }
                    $nama_foto = str_replace(['','/'],'-', $request->judul);
                    $ext_foto   = $request->sampul->getClientOriginalExtension();
                    $fotoname   = $nama_foto ."-". date('Ymdhis') .".". $ext_foto;
                    $tmp_foto   = 'img/sampul';
                    $proses     = $request->sampul->move($tmp_foto,$fotoname);
                 
                    $validate['sampul'] = $fotoname;
                }
            }

            if(isset($request->pdf_file)){
                if (!empty($request->pdf_file) && $request->pdf_file != NULL) {
                    if (!empty($buku) && $buku->pdf_file != NULL) {
                        $path = "file/".$buku->pdf_file;
                        if (file_exists($path)) {
                            unlink($path); //menghapus foto di direktori
                        }
                    }
                    $nama_file = str_replace(['','/'],'-', $request->judul);
                    $ext_file   = $request->pdf_file->getClientOriginalExtension();
                    $filename   = $nama_file ."-". date('Ymdhis') .".". $ext_file;
                    $tmp_file   = 'file';
                    $proses     = $request->pdf_file->move($tmp_file,$filename);

                    $validate['pdf_file'] = $filename;
                }
            }

            $buku->update($validate);

            return redirect()->route('buku')->with('status', 'success')->with('message', 'Berhasil diupdate');
        }
        catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function delete($id){
        $buku = Buku::where('id_buku', $id)->first();
        if(!empty($buku)){
            if ($buku->sampul != NULL) {
                $path = 'img/sampul/' . $buku->sampul;
                if(file_exists($path)){
                    unlink($path);
                }
            }
            if ($buku->pdf_file != NULL) {
                $path = 'file/' . $buku->pdf_file;
                if(file_exists($path)){
                    unlink($path);
                }
            }

            $buku->delete();
            return redirect()->route('buku')->with('status', 'success')->with('message', 'Berhasil di Hapus');
        }else{
            return redirect()->route('buku')->with('status', 'error')->with('message', 'Gagal di Hapus');
        }
    }
}