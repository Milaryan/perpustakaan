<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users;

class UserController extends Controller
{
    protected $judul = 'Data Anggota';
    protected $menu = 'data-user';
    protected $direktori = 'admin.crud_user';

    public function index(Request $request){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['user'] = User::where('level_user','anggota')->get(); 

        if(isset($request->id_user)){
            $data['user'] = Users::where('id_user',$request->id_user)->where('level_user', 'anggota')->get();
        }
        
        return view($this->direktori.'.home',$data);
    }

    public function create(){
        $data['judul'] = 'Tambah Anggota';
        $data['menu'] = $this->menu;

        return view($this->direktori.'.add',$data);
    }

    public function store(Request $request){
        try{
            // dd($request);

            $validate = $request->validate([
                'nama_user' => 'required',
                'alamat' => 'required',
                'email' => 'required|email:dns|unique:users',
                'no_telp' => 'required|max:20',
                'password' => 'required|min:5',
            ]);
            
            $validate['level_user'] = "anggota";
            $validate['password'] = Bcrypt($validate['password']);
    
            User::create($validate);
            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
        }
        catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function show($id)
    {
        $data['user'] = Users::where('id_user', $id)->first();

        return view($this->direktori.'.show',$data);
    }
    
    public function edit($id)
    {
        $data['judul'] = 'Edit User';
        $data['menu'] = $this->menu;

        $data['user'] = Users::where('id_user', $id)->first();

        return view($this->direktori.'.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'nama_user' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|max:20',
            ]);
            
            $user = Users::where('id_user', $id)->first();

            if(!empty($request->password)){
                $validate['password'] = Bcrypt($validate['password']);
            }else{
                $validate['password'] = $user->password;
            }
            if($request->email != $user->email){
                $request->validate(['email' => 'required|email:dns|unique:users']);
            }
    
            $user->update($validate);

            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil diupdate');
        }
        catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function delete($id){
        $users = Users::where('id_user', $id)->first();
        if(!empty($users)){
            $users->delete();

            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil dihapus');
        }else{
            return redirect()->route('user')->with('status', 'error')->with('message', 'Gagal');
        }
    }
}
