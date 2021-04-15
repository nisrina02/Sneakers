<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Session;
use Carbon\Carbon;
use Alert;
use DB;


class TransaksiController extends Controller
{
    public function __construct(){
        $this->middleware('cek_login');
    }

    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('Transaksi.transaksi', compact('barang'));
    }

    public function transaksi(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tgl = Carbon::now();

        //validasi jumlah
        if($request->qty > $barang->stok)
        {
            return redirect('transaksi/'.$id)->with('Alert_message', 'Pesanan melebihi batas stok yang ada');
        }

        //cek validasi
        $cek_transaksi = Transaksi::where('id_user', Session::get('id'))->where('status', 0)->first();

        //simpan ke database transaksi
        if(empty($cek_transaksi))
        {
            $transaksi = new Transaksi;
            $transaksi->id_user = Session::get('id');
            $transaksi->tgl_transaksi = $tgl;
            $transaksi->status = 0;
            $transaksi->total = 0;
            $transaksi->save();
        }
        
        //simpan ke detail transaksi
        $transaksi_baru = Transaksi::where('id_user', Session::get('id'))->where('status', 0)->first();

        //cek detail Transaksi
        $cek_detail = DetailTransaksi::where('id_barang', $barang->id)->where('id_transaksi', $transaksi_baru->id)->first();

        if(empty($cek_detail))
        {
            $detail = new DetailTransaksi;
            $detail->id_barang = $barang->id;
            $detail->id_transaksi = $transaksi_baru->id;
            $detail->qty = $request->qty;
            $detail->subtotal = $barang->harga * $request->qty;
            $detail->save();
        } else {
            $detail = DetailTransaksi::where('id_barang', $barang->id)->where('id_transaksi', $transaksi_baru->id)->first();
            $detail->qty = $detail->qty + $request->qty;
            $harga_detail_baru = $barang->harga * $request->qty;
            $detail->subtotal = $detail->subtotal + $harga_detail_baru;
            $detail->update();
        }

        //update transaksi
        $transaksi = Transaksi::where('id_user', Session::get('id'))->where('status', 0)->first();
        $transaksi->total = $transaksi->total + $barang->harga * $request->qty;
        $transaksi->update();

        Alert()->success('Pesanan berhasil ditambahkan ke keranjang', 'Success');
        return redirect('checkout');
    }

    public function checkout()
    {
        $transaksi = Transaksi::where('id_user', Session::get('id'))->where('status', 0)->first();
        $detail = [];
        if(!empty($transaksi)){
            $detail = DetailTransaksi::where('id_transaksi', $transaksi->id)->get();
        }

        return view('Transaksi.checkout', compact('transaksi', 'detail'));
    }


    public function konfirmasi()
    {
        $transaksi = Transaksi::where('id_user', Session::get('id'))->where('status', 0)->first();
        $id_transaksi = $transaksi->id;
        $transaksi->status = 1;
        $transaksi->update();

        $detail = DetailTransaksi::where('id_transaksi', $transaksi->id)->get();
        foreach($detail as $dtl)
        {
            $barang = Barang::where('id', $dtl->id_barang)->first();
            $barang->stok = $barang->stok - $dtl->qty;
            $barang->update();
        }

        Alert()->success('Pesanan berhasil di checkout', 'Success');
        return redirect('checkout');
    }

    public function delete_checkout($id)
    {
        $detail = DetailTransaksi::where('id', $id)->first();

        $transaksi = Transaksi::where('id', $detail->id_transaksi)->first();
        $transaksi->total = $transaksi->total - $detail->subtotal;
        $transaksi->update();

        $detail->delete();
        Alert()->error('Pesanan berhasil dihapus', 'Success');
        return redirect('checkout');
    }

}
