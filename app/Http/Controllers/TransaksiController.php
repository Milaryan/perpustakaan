<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use DateTime;
use Illuminate\Http\Request;

use function Psy\debug;

class TransaksiController extends Controller
{

    protected $judul = 'Data Transaksi';
    protected $menu = 'data-transaksi';
    protected $direktori = 'admin.crud_transaksi';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['trans'] = Transaksi::with(['user'])->with(['buku'])->orderBy('created_at', 'DESC')->get();

        if(isset($request->kode)){
            $data['trans'] = Transaksi::with([
                'user','buku'
            ])->where('kode_transaksi',$request->kode)->get();
        }
        
        return view($this->direktori.'.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['judul'] = 'Tambah Transaksi';
        $data['menu'] = $this->menu;

        return view($this->direktori.'.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // dd($request);
            $buku = Buku::where('id_buku', $request->buku_id)->first();
            $pinjam = Transaksi::where('user_id', $request->user_id)->where('buku_id', $request->buku_id)->first();
                // dd($pinjam);
                
            if ($pinjam) {
                if ($pinjam->status == 'Pinjam') {
                    return redirect()->back()->withInput()->with('status', 'error')->with('message', 'Buku Masih di Pinjam');
                }elseif ($pinjam->status == 'Pending') {
                    return redirect()->back()->withInput()->with('status', 'error')->with('message', 'Silahkan Ambil Buku di Perpustakaan');
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
        
                    if ($validate) {
                        $stok = $buku->stok - 1;
        
                        $buku->stok = $stok;
                        $buku->save();
                    }
                    $validate['kode_transaksi'] = 'TR-'.date('dhms');
                    $validate['tgl_kembali'] = '-';
                    $validate['denda'] = '0';
            
                    Transaksi::create($validate);
                    return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
                } else {
                    return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Stok Tidak Tersedia');
                }
            }
        }
        catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'user_id' => 'required',
                'buku_id' => 'required',
                'tgl_pinjam' => 'required',
                'bts_kembali' => 'required',
                'status' => 'required'
            ]);
            
            $transaksi = Transaksi::where('id_transaksi', $id);
            $buku = Buku::where('id_buku',$request->id_buku)->first();

            if ($buku != $request->buku_id) {
                $tambah = $buku->stok + 1;

                $buku->stok = $tambah;
                $buku->save();
            }
            if ($validate) {
                $buku = Buku::where('id_buku', $request->buku_id)->first();
                $stok = $buku->stok - 1;

                $buku->stok = $stok;
                $buku->save();
            }

            $transaksi->update($validate);

            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil diupdate');
        }
        catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $transaksi = Transaksi::where('id_transaksi', $id)->first();

        if ($transaksi->status === 'Pinjam') {
            $buku = Buku::where('id_buku', $transaksi->buku_id)->first();
            $stok = $buku->stok + 1;

            $buku->stok = $stok;
            $buku->save();
        }
        if(!empty($transaksi)){
            $transaksi->delete();

            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil dihapus');
        }else{
            return redirect()->route('transaksi')->with('status', 'error')->with('message', 'Gagal');
        }
    }

    public function pinjam($id){
        $transaksi = Transaksi::where('id_transaksi', $id)->first();
        $transaksi->status = 'Pinjam';
        $transaksi->tgl_pinjam = date('d-m-Y');
        $transaksi->bts_kembali = date('d')+3 . date('-m-Y');

        $transaksi->save();

        if ($transaksi) {
            $buku = Buku::where('id_buku', $transaksi->buku_id)->first();
            $stok = $buku->stok + 1;

            $buku->stok = $stok;
            $buku->save();
        }
        return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil di-pinjamkan');
    }
    
    public function batal($id){
        $transaksi = Transaksi::where('kode_transaksi', $id)->first();
        $transaksi->status = 'Batal';

        $transaksi->update();
        return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil di-batalkan');
    }

    public function kembali(Request $request ,$id){
        try {
            $transaksi = Transaksi::where('id_transaksi', $id)->first();
            $transaksi->status = 'Kembali';

            if ( date('d-m-Y') > $transaksi->bts_kembali) {
                $kembali = new DateTime($transaksi->bts_kembali); 
                $jatuh_tempo   = new DateTime(date('d-m-Y')); 

                $selisih = $kembali->diff($jatuh_tempo)->format('%d');
                

                $denda = 2000 * $selisih;
            }else {
                $denda = 0;
            }
            $transaksi->denda = $denda;
            $transaksi->tgl_kembali = date('d-m-Y');

            $transaksi->save();

            if ($transaksi) {
                $buku = Buku::where('id_buku', $transaksi->buku_id)->first();
                $stok = $buku->stok + 1;

                $buku->stok = $stok;
                $buku->save();
            }
            return redirect()->route('transaksi')->with('status', 'success')->with('message', 'Berhasil di-kembalikan');
        } catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
