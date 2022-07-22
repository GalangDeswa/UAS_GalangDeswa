<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kat_toko extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kat_toko';
    
    public function r_toko(){
    return $this->belongsTo(toko::class);
    }
}
