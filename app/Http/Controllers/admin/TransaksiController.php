<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fashion;
use App\Models\Transaksi;
use App\Models\Cart;

class TransaksiController extends Controller
{
    public function checkout(Request $request) {
        try {
            // Simpan data ke dalam database transaksi
            foreach ($request->items as $item) {
                // Simpan data ke dalam database transaksi
                Transaksi::create([
                    'id_fashion' => $item['id_fashion'],
                    'nama' => $item['nama'],
                    'kategori' => $item['kategori'],
                    'image' => $item['image'],
                    'harga' => $item['harga'],
                    'qty' => $item['qty'],
                    
                ]);
            
                // Kurangi stok fashion
                $fashion = Fashion::findOrFail($item['id_fashion']);
                $fashion->stok -= $item['qty'];
                $fashion->save();
            }
            
    
            // Hapus semua data dari keranjang (cart)
            Cart::truncate(); // Jika menggunakan Eloquent, asumsikan model Cart Anda adalah Cart
    
            // Response sukses
            return redirect('/cart')->with('success', 'Berhasil Melakukan Transaksi');
        } catch (\Exception $e) {
            // Tangani jika terjadi error dalam menyimpan data atau menghapus data dari keranjang
            return redirect('/cart')->with('error', 'Terjadi kesalahan saat melakukan checkout');
        }
    }
    
}
