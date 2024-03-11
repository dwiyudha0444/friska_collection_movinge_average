<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fashion;
use App\Models\Transaksi;
use App\Models\Prediksi;
use App\Models\Cart;
use Carbon\Carbon;

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
            
            foreach ($request->items as $item) {
                // Ambil transaksi sebelumnya berdasarkan id_fashion dan bulan
                $previousTransaction = Prediksi::where('id_fashion', $item['id_fashion'])
                    ->whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->first();
            
                if ($previousTransaction) {
                    // Jika ada transaksi sebelumnya, update qty-nya
                    $previousTransaction->qty += $item['qty'];
                    $previousTransaction->save();
                } else {
                    // Jika tidak ada transaksi sebelumnya, simpan data transaksi baru
                    Prediksi::create([
                        'id_fashion' => $item['id_fashion'],
                        'nama' => $item['nama'],
                        'kategori' => $item['kategori'],
                        'image' => $item['image'],
                        'qty' => $item['qty'],
                    ]);
                }
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
    
    public function totalQTY(Request $request){

        $totalsPerFashionPerMonth = Transaksi::selectRaw('id_fashion, YEAR(created_at) as year, MONTH(created_at) as month, SUM(qty) as total_qty')
            ->groupBy('id_fashion', 'year', 'month')
            ->get();
        
        foreach ($totalsPerFashionPerMonth as $total) {
            echo "ID Fashion: " . $total->id_fashion . ", Bulan: " . $total->month . "-" . $total->year . ", Total Qty: " . $total->total_qty . "\n";
        }
        
    }

}
