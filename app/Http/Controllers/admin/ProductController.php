<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fashion;
use App\Models\Prabotan;
use DB;

class ProductController extends Controller
{
    public function index_fashion()
    {
        $fashion = Fashion::orderBy('id','DESC')->get();
        return view('admin.stok.stok_fashion.index',compact('fashion'));
    }

    public function index_prabotan()
    {
        $prabotan = Prabotan::orderBy('id','DESC')->get();
        return view('admin.stok.stok_prabotan.index',compact('prabotan'));
    }
}
