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

        if($request->qty > $barang->stok){
            return redirect('transaksi/'.$id);
        }

        $cek = Transaksi::where('id_user', Session::get('id'))->first();

        if(empty($cek)){
            $transaksi = new Transaksi;
            $transaksi->id_user = Session::get('id');
            $transaksi->tgl_transaksi = $tgl;
            $transaksi->total = 0;
            $transaksi->save();
        }
        $transaksi_baru = Transaksi::where('id_user', Session::get('id'))->first();
        $cek_detail = DetailTransaksi::where('id_barang', $barang->id)->where('id_transaksi', $transaksi_baru->id)->first();

        if(empty($cek_detail)){
            $detail = new DetailTransaksi;
            $detail->id_barang = $barang->id;
            $detail->id_transaksi = $transaksi_baru->id;
            $detail->qty = $request->qty;
            $detail->subtotal = $barang->harga*$request->qty;
            $detail->save();
        } else {
            $detail = DetailTransaksi::where('id_barang', $barang->id)->where('id_transaksi', $transaksi_baru->id)->first();
            $detail->qty = $detail->qty + $request->qty;
            $harga_detail_baru = $barang->harga * $request->qty;
            $detail->subtotal = $detail->subtotal + $harga_detail_baru;
            $detail->update();
        }

        $transaksi = Transaksi::where('id_user', Session::get('id'))->first();
        $transaksi->total = $transaksi->total+$barang->harga*$request->qty;
        $transaksi->update();

        Alert()->success('Pesanan berhasil masuk ke keranjang', 'Success');
        return redirect('home');
        // return redirect('tampil_transaksi')->with('alert_message', 'Item berhasil ditambahkan ke keranjang');
    }

    public function checkout()
    {
        $transaksi = Transaksi::where('id_user', Session::get('id'))->first();
        $detail = DB::table('detail_transaksi')
                        ->join('transaksi', 'transaksi.id', '=', 'detail_transaksi.id_transaksi')
                        ->join('barang', 'barang.id', '=', 'detail_transaksi.id_barang')
                        ->select('detail_transaksi.id', 'barang.nama_barang', 'barang.harga', 'detail_transaksi.subtotal', 'detail_transaksi.qty')
                        ->where('id_transaksi', $transaksi->id)
                        ->get();

        return view('Transaksi.checkout', compact('transaksi', 'detail'));
    }


    public function konfirmasi()
    {
        $transaksi = Transaksi::where('id_user', Session::get('id'))->first();
        
        Alert()->success('Pesanan berhasil di checkout', 'Success');
        return redirect('home');
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
