<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'nama_barang', 
        'foto', 
        'jenis', 
        'deskripsi',
        'harga',
        'stok'
    ];
    protected $table = "barang";
    protected $primaryKey = "id"; 

    public function detail_transaksi(){
        return $this->hasMany('App\Models\DetailTransaksi', 'id_barang', 'id');
    }

    public function merchant(){
        return $this->belongsTo('App\Models\Merchant', 'id_merchant', 'id');
    }
}
