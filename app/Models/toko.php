<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barang;

class toko extends Model
{
    use HasFactory;
    protected $table = 'tokos';
     protected $primaryKey = 'id_toko';

     public function r_kat_toko(){
     return $this->hasOne(kat_toko::class,'id_kat_toko','id_kategori_toko');
     }

     public function r_barang(){
       return $this->hasMany(barang::class,'id_toko_barang');
     }

     public function barang_toko(){
     return $this->belongsTo(barang::class);
     }
}
