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
    
    public function hapusItem(Request $request) {
        // Temukan item berdasarkan ID
        $item = Cart::find($request->cart_id);
    
        // Hapus item jika ditemukan
        if ($item) {
            $item->delete();
            // Redirect kembali ke halaman keranjang atau berikan respons sesuai kebutuhan
            return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
        } else {
            // Item tidak ditemukan, berikan respons atau tindakan sesuai kebutuhan
            return redirect()->back()->with('error', 'Item tidak ditemukan dalam keranjang.');
        }
    }
    
}
