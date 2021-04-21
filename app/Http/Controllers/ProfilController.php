<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use Alert;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct(){
        $this->middleware('cek_login');
    }

    public function index()
    {
        $profil = User::where('id', Session::get('id'))->first();

        return view('Login.profil', compact('profil'));
    }

    public function update(Request $request)
    {

        $profil = User::where('id', Session::get('id'))->first();
        $profil->nama = $request->nama;
        $profil->telp = $request->telp;
        $profil->alamat = $request->alamat;
        $profil->email = $request->email;
        if(!empty($request->password)){
            $profil->password = md5($request->password);
        }
        $profil->update();

        Alert()->success('Profil berhasil diupdate', 'Success');
        return redirect('home');
    }
}
