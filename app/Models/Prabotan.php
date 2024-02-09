<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prabotan extends Model
{
    protected $table = 'prabotans';
    
    protected $fillable = [
        'name', 
        'kategori', 
        'image', 
        'harga'
    ];
}
