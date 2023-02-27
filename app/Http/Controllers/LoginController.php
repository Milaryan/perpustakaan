<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('form_logreg/login');
    }

    public function authenticate(Request $request){
        try {
            $credentials = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                if (Auth::user()->level_user == 'admin') {
                    return redirect()->with('status', 'success')->with('message', 'Selamat Datang '.Auth::user()->nama_user)->intended('/dashboard');
                }else{
                    return redirect()->intended('/user-pages');
                }
            }
            return back()->withInput()->with('status', 'error')->with('message', 'Email atau Password Salah');
        } catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'success')->with('message', 'Berhasil Logout');
    }

    public function regis()
    {
        return view('form_logreg/registrasi');
    }

    public function postregis(Request $request)
    {
        try{

            $validate = $request->validate([
                'nama_user' => 'required',
                'alamat' => 'required',
                'email' => 'required|email:dns|unique:users',
                'no_telp' => 'required|max:20',
                'password' => 'required|min:5',
            ]);
    
            $validate['password'] = Bcrypt($validate['password']);
            $validate['level_user'] ='anggota';
    
            User::create($validate);
            return redirect()->route('login')->with('status', 'success')->with('message', 'Berhasil Registrasi');
        }
        catch (\Throwable $th) {
            return back()->withInput()->with('status', 'error')->with('message', $th->getMessage());
        }
    }
}
