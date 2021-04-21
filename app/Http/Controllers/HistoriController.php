<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Alert;
use DB;

class HistoriController extends Controller
{
    public function __construct(){
        $this->middleware('cek_login');
    }

    public function index()
    {
        $transaksi = Transaksi::where('id_user', Session::get('id'))->where('status', '!=', 0)->get();

        return view('Transaksi.histori', compact('transaksi'));
    }

    public function detail($id)
    {
        
    }
}
