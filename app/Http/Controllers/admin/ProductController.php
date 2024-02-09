<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id','DESC')->get();
        return view('admin.stok.stok_fashion.index',compact('product'));
    }
}
