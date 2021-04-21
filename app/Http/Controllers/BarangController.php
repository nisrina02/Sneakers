<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Barang;
use App\Models\Merchant;
use DB;
use Session;

class BarangController extends Controller
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
        $data = DB::table('barang')
                        ->select('barang.id', 'barang.nama_barang', 'barang.foto', 'barang.jenis',
                                'barang.deskripsi', 'barang.harga', 'barang.stok', 'merchant.nama_toko')
                        ->join('merchant', 'merchant.id', '=', 'barang.id_merchant')
                        ->get();

        return view('Barang.barang', compact('data'));
    }

    public function admin()
    {
        $data = DB::table('barang')
                        ->select('barang.id', 'barang.nama_barang', 'barang.foto', 'barang.jenis',
                                'barang.deskripsi', 'barang.harga', 'barang.stok', 'merchant.nama_toko')
                        ->join('merchant', 'merchant.id', '=', 'barang.id_merchant')
                        ->simplepaginate(4);

        return view('Barang.barang_admin', compact('data'));
    }

    public function seller($id)
    {
        $data = DB::table('barang')
                        ->select('barang.id', 'barang.nama_barang', 'barang.foto', 'barang.jenis',
                                'barang.deskripsi', 'barang.harga', 'barang.stok', 'merchant.nama_toko', 'users.id')
                        ->join('merchant', 'merchant.id', '=', 'barang.id_merchant')
                        ->join('user', 'users.id', '=', 'merchant.id_user')
                        ->where('id_user', Session::get('id'))
                        ->get();

        return view('Barang.barang_admin', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Merchant::all();
        return view('Barang.barang_create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'foto' => 'required|mimes:jpeg, jpg, png, svg',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        // $imgName = $request->foto->getClientOriginalName().'-'.time()'.'.$request->foto->extension();
        // $request->foto->move(public_path('Uploads'), $imgName);
        $foto = rand().$request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(base_path("./public/Uploads"), $foto);

        // if($validator->fails()){
        //     return $this->response->errorResponse($validator->errors());
		// }

        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->foto = $foto;
        $barang->jenis = $request->jenis;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->id_merchant = $request->id_merchant;
        $barang->save();

        return redirect('barang_admin')->with('alert_pesan', 'Data telah disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = DB::table('barang')
                      ->select('barang.id', 'barang.nama_barang', 'barang.foto', 'barang.jenis',
                              'barang.deskripsi', 'barang.harga', 'barang.stok', 'merchant.nama_toko')
                      ->join('merchant', 'merchant.id', '=', 'barang.id_merchant')
                      ->where('barang.id', $id)
                      ->get();

      return view('Barang.detail_barang', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::where('id', $id)->get();
        return view('Barang.barang_update', compact('data'));
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
            'nama_barang' => 'required',
            'foto' => 'required|mimes:jpeg, jpg, png, svg',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        // $imgName = $request->foto->getClientOriginalName().'-'.time()'.'.$request->foto->extension();
        // $request->foto->move(public_path('Uploads'), $imgName);
        $foto = rand().$request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(base_path("./public/Uploads"), $foto);

        // if($validator->fails()){
        //     return $this->response->errorResponse($validator->errors());
		// }

        $barang = Barang::where('id', $id)->first();
        $barang->nama_barang = $request->nama_barang;
        $barang->foto = $foto;
        $barang->jenis = $request->jenis;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->id_merchant = $request->id_merchant;
        $barang->save();

        return redirect('barang_admin')->with('alert_pesan', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::where('id', $id)->first();

        if($data != null){
            $data->delete();

            return redirect('/barang')->with('alert_message', 'Berhasil menghapus data!');
        }

        return redirect('/barang')->with('alert_message', 'ID tidak ditemukan!');
    }
}
