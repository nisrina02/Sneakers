<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_transaksi',
        'id_barang',
        'qty', 
        'subtotal'
    ];
    protected $table = "detail_transaksi";
    protected $primaryKey = "id";

    public function item(){
        return $this->belongsTo('App\Models\Barang', 'id', 'id_barang');
    }

    public function transaksi(){
        return $this->belongsTo('App\Models\Transaksi', 'id', 'id_transaksi');
    }
}
