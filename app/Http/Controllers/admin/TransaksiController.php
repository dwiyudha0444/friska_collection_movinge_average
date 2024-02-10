<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Cart;

class TransaksiController extends Controller
{
    public function checkout(Request $request) {
        try {
            // Simpan data ke dalam database transaksi
            foreach ($request->items as $item) {
                Transaksi::create([
                    'nama' => $item['nama'],
                    'kategori' => $item['kategori'],
                    'image' => $item['image'],
                    'harga' => $item['harga'],
                    'qty' => $item['qty'],
                    // tambahkan atribut transaksi lainnya di sini sesuai kebutuhan
                ]);
            }
    
            // Hapus semua data dari keranjang (cart)
            Cart::truncate(); // Jika menggunakan Eloquent, asumsikan model Cart Anda adalah Cart
    
            // Response sukses
            return redirect('/cart')->with('success', 'Data Berhasil Diubah dan Keranjang Dikosongkan');
        } catch (\Exception $e) {
            // Tangani jika terjadi error dalam menyimpan data atau menghapus data dari keranjang
            return redirect('/cart')->with('error', 'Terjadi kesalahan saat melakukan checkout');
        }
    }
    
}
