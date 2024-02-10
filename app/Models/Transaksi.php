<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = [
        'id_fashion',
        'nama', 
        'kategori', 
        'image', 
        'harga',
        'qty',
    ];
}
