<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('Login.login');
    }

    public function cek_Login(Request $req){
        $this->validate($req, [
            'email'=>'required',
            'password' => 'required'
        ]);
//ketika mengakses variabel prosel dimana database user dengan fild email  dengan inisial email dan pasword dengan inisial pasword (md5 untuk menyembunyikan nya)
        $proses=User::where('email', $req->email)
                    ->where('password', md5($req->password));
//logika proses
//jika parameter proses count nya lebih besar dari 0(data tidak ada)
        if($proses->count()>0){
            $data=$proses->first();
            Session::put('id', $data->id);
            Session::put('nama', $data->nama);
            Session::put('telp', $data->telp);
            Session::put('email', $data->email);
            Session::put('level', $data->level);
            Session::put('login_status', true);//jika data itu benar maka akan menuju ke home
            return redirect('/home');
        } else {
            Session::flash('pesan', 'Email dan Password salah');
            return redirect('log in');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('log in');
    }
}
