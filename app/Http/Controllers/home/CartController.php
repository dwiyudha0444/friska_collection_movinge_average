<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        // Lakukan validasi request di sini jika diperlukan
    
        // Simpan data ke dalam database cart
        Cart::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            // Tambahkan kolom lain yang diperlukan
        ]);
        
    
        // Response sukses
        return response()->json(['success' => true]);
    }
    
}
