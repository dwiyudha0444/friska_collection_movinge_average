<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::orderBy('id','DESC')->get();
        return view('home.cart.index',compact('cart'));
    }

    public function addToCart(Request $request) {
    
        // Simpan data ke dalam database cart
        Cart::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
        ]);
        
        // Response sukses
        return redirect('/landingpage')->with('success', 'Data Berhasil Diubah');
    }
    
    public function hapusItem(Request $request) {
        // Temukan item berdasarkan ID
        $item = Cart::find($request->cart_id);
    
        // Hapus item jika ditemukan
        if ($item) {
            $item->delete();
            
            return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
        } else {
            
            return redirect()->back()->with('error', 'Item tidak ditemukan dalam keranjang.');
        }
    }

    public function update(Request $request) {
        // Dapatkan array ID keranjang dan kuantitas
        $cartIds = $request->cart_id;
        $quantities = $request->quantity;
    
        // Loop melalui setiap item untuk memperbarui kuantitasnya
        foreach ($cartIds as $index => $cartId) {
            // Temukan item berdasarkan ID-nya
            $item = Cart::find($cartId);
    
            // Perbarui kuantitas jika item ada
            if ($item) {
                $item->qty = $quantities[$index];
                $item->save();
            }
        }
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Keranjang diperbarui dengan sukses.');
    }
    
    
    
}
