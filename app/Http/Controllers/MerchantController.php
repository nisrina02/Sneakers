<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Merchant;
use DB;
use Session;

class MerchantController extends Controller
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
        if($cek == "admin"){
            $data = DB::table('merchant')
                        ->select('merchant.id', 'merchant.nama_toko', 'merchant.alamat', 'merchant.id_user',
                                'users.nama')
                        ->join('users', 'users.id', '=', 'merchant.id_user')
                        ->simplepaginate(4);

            return view('Merchant.merchant', compact('data'));
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
        
        $data = User::where('level', '=', 'seller')->get();
        return view('Merchant.merchant_create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_toko' => 'required',
            'alamat' => 'required',
          ]);

          $data = new Merchant();
          $data->nama_toko = $request->nama_toko;
          $data->alamat = $request->alamat;
          $data->id_user = $request->id_user;
          $data->save();

          return redirect('/merchant')->with('alert_pesan', 'berhasil menambah data');
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
        
        $data = Merchant::where('id', $id)->get();
        return view('Merchant.merchant_update', compact('data'));
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
            'nama_toko' => 'required',
            'alamat' => 'required',
          ]);

          $data = Merchant::where('id', $id)->first();
          $data->nama_toko = $request->nama_toko;
          $data->alamat = $request->alamat;
          $data->id_user = $request->id_user;
          $data->save();

          return redirect('/merchant')->with('alert_pesan', 'berhasil mengubah data');
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

                return redirect('/merchant')->with('alert_message', 'Berhasil menghapus data!');
            }

                return redirect('/merchant')->with('alert_message', 'ID tidak ditemukan!');  
        
    }
}
