<?php

namespace App\Http\Controllers;

use App\Models\Kariawan;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login()
    {
        return view('autentikasi/login');
    }

    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate(
        [
            'username' => ['required'],
            'password' => ['required'],
        ],[
            'username.required' => 'username salah',
            'password.required' => 'password salah'
        ]
    
        );
        
        //cek apakah login valid
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard-admin');
        }

        if (Auth::guard('pimpinan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard-pimpinan');
        }

        if (Auth::guard('kariawan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard-kariawan');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function ubahPassword()
    {
        return view('autentikasi/ubah-password');
    }

    public function prosesUbahPassword(Request $request)
    {
        $validated = $request->validate(
            [
                'passwordLama' => 'required|max:255',
                'passwordBaru' => 'required|max:255',
                'konfirmasiPassword' => 'required|max:255',
            ],
                [
                    'passwordLama.required' => 'Password Lama wajib diisi',
                    'passwordBaru.required' => 'Password Baru wajib diisi',
                    'konfirmasiPassword.required' => 'Konfirmasi Password wajib diisi',
                ]
        ); 
        if(Auth::user()->role_id == 2){
            $cek = Pimpinan::where('id', Auth::user()->id)->first();
        }else{
            $cek = Kariawan::where('id', Auth::user()->id)->first();
        }
        if (Hash::check($request->passwordLama, $cek->password)) {
            if($request->passwordBaru == $request->konfirmasiPassword){
                $cek->password = Hash::make($request['passwordBaru']);
                $cek->update();
                return redirect('/logout')->with('status', 'Silahkan Login menggunakan passwor baru');
            }else{
                return redirect()->back()->with('errork', 'Password tidak sama dengan paswor baru.');
            }
        } else {
            return redirect()->back()->with('error', 'Password yang anda masukkan salah.');
        }
        
    }
}
