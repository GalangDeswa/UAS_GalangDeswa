<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    // use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';

   public function nama_toko(){
   return $this->hasOne(toko::class,'id_toko','id_toko_barang');

   }

   public function foto_barang(){
   return $this->hasMany(foto_barang::class,'id_barang');
   }

   public function kat_barang(){
   return $this->hasOne(kat_barang::class,'id_kat_barang','id_kategori_barang');
    
    }
}
