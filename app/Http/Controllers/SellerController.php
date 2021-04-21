<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App\Models\User;

class SellerController extends Controller
{
    public function __construct(){
        $this->middleware('cek_login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cek = Session::get('level');
        if($cek == 'admin'){
            $data = User::where('level', '=', 'seller')->simplepaginate(4);

            return view('Seller.seller', compact('data'));
        } else {
            return abort(404);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Seller.seller_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'telp' => 'required|numeric|min:10',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

          $data = new User();
          $data->nama = $request->nama;
          $data->telp = $request->telp;
          $data->email = $request->email;
          $data->password = md5($request->password);
          $data->level = 'seller';
          $data->save();

          return redirect('/seller')->with('alert_pesan', 'berhasil menambah data');
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
        $data = User::where('id', $id)->get();
        return view('Seller.seller_update', compact('data'));
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
        $this->validate($request, [
            'nama' => 'required|max:100',
            'telp' => 'required|numeric|min:10',
        ]);

        $data = User::where('id', $id)->first();
            $data->nama = $request->nama;
            $data->telp = $request->telp;
            $data->save();

            return redirect('/seller')->with('alert_message', 'Berhasil mengubah data!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::where('id', $id)->first();

        if($data != null){
            $data->delete();

            return redirect('/seller')->with('alert_message', 'Berhasil menghapus data!');
        }

        return redirect('/seller')->with('alert_message', 'ID tidak ditemukan!');
    }
}
