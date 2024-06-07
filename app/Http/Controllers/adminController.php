<?php

namespace App\Http\Controllers;

use App\Models\Kariawan;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function halamanUser()
    {
        $pimpinan = Pimpinan::all();
        $kariawan = Kariawan::all();
        return view('admin/halaman-user', ['pimpinan'=>$pimpinan, 'kariawan'=>$kariawan]);
    }

    public function tambahPimpinan ()
    {
        return view('admin/tambah-pimpinan');
    }

    public function prosesTambahPimpinan(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required|max:255',
                'username' => 'required|unique:pimpinan|max:255',
                'password' => 'required|max:255',
            ],
                [
                    'nama.required' => 'nama wajib diisi',
                    'nama.max' => 'maksimal 255 carakter',

                    'username.required' => 'username wajib diisi',
                    'username.unique' => 'username sudah ada',
                    'username.max' => 'maksimal 255 carakter',

                    'password.required' => 'password wajib diisi',
                    'password.max' => 'maksimal 255 carakter',
                ]
        ); 
        $request['password'] = Hash::make($request['password']);
        $pimpinan = Pimpinan::create($request->all());
        return redirect('/halaman-user')->with('statusp', 'Data Pimpinan Sukses Ditambahkan');
    }

    public function tambahKariawan ()
    {
        return view('admin/tambah-kariawan');
    }

    public function prosesTambahKariawan(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required|max:255',
                'username' => 'required|unique:kariawan|max:255',
                'password' => 'required|max:255',
            ],
                [
                    'nama.required' => 'nama wajib diisi',
                    'nama.max' => 'maksimal 255 carakter',

                    'username.required' => 'username wajib diisi',
                    'username.unique' => 'username sudah ada',
                    'username.max' => 'maksimal 255 carakter',

                    'password.required' => 'password wajib diisi',
                    'password.max' => 'maksimal 255 carakter',
                ]
        ); 
        $request['password'] = Hash::make($request['password']);
        $kariawan = Kariawan::create($request->all());
        return redirect('/halaman-user')->with('statusk', 'Data Kariawan Sukses Ditambahkan');
    }

    public function editPimpinan($id)
    {
        $pimpinan = Pimpinan::where('id', $id)->first();
        return view('admin/edit-pimpinan', ['pimpinan'=>$pimpinan]);
    }

    public function prosesEditPimpinan(Request $request, $id)
    {
        $validated = 
            [
                'nama' => 'required|max:255',
            ];
        $pimpinan = Pimpinan::where('id', $id)->first();
        if ($request['username'] != $pimpinan->username) {
            $validated['username'] ='required|unique:pimpinan';
        }
        $request->validate($validated);
        $pimpinan->nama = $request->nama;
        $pimpinan->username = $request->username;
        $pimpinan->password = Hash::make($request['password']);
        $pimpinan->update();
        return redirect('/halaman-user')->with('statusp', 'Data Pimpinan Sukses Diubah');
    }

    public function editKariawan($id)
    {
        $kariawan = Kariawan::where('id', $id)->first();
        return view('admin/edit-kariawan', ['kariawan'=>$kariawan]);
    }

    public function prosesEditKariawan(Request $request, $id)
    {
        $validated = 
            [
                'nama' => 'required|max:255',
            ];
        $kariawan = Kariawan::where('id', $id)->first();
        if ($request['username'] != $kariawan->username) {
            $validated['username'] ='required|unique:kariawan';
        }
        $request->validate($validated);
        $kariawan->nama = $request->nama;
        $kariawan->username = $request->username;
        $kariawan->password = Hash::make($request['password']);
        $kariawan->update();
        return redirect('/halaman-user')->with('statusk', 'Data Kariawan Sukses Diubah');
    }

    public function hapusPimpinan($id)
    {
        $pimpinan = Pimpinan::where('id', $id)->first();
        $pimpinan->delete();
        return redirect('/halaman-user')->with('statusp', 'Data pimpinan Sukses Diubah');
    }

    public function hapusKariawan($id)
    {
        $kariawan = Kariawan::where('id', $id)->first();
        $kariawan->delete();
        return redirect('/halaman-user')->with('statusk', 'Data kariawan Sukses Diubah');
    }
}
