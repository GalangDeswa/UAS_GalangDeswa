<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_barang extends Model
{
    protected $table = 'foto_barangs';
    protected $primaryKey = 'id_foto_barang';
    protected $fillable = [
    'foto',
    'id_barang',
    ];
}
