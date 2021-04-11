<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'nama_toko', 
        'alamat', 
        'id_user'
    ];
    
    protected $table = "merchant";
    protected $primaryKey = 'id';

    public function merchant(){
        return $this->belongsTo('App\Models\User', 'id', 'id_user');
    }
}
