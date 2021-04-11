<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'tgl_transaksi',
        'total'
    ];
    protected $table = "transaksi";
    protected $primaryKey = "id";

    public function transaksi(){
        return $this->belongsTo('App\Models\User', 'id', 'id_user');
    }
}
