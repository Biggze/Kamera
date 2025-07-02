<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
public function index()
{
    $products = Product::with(['category', 'brand'])
        ->where('status', 'published') // sesuaikan dengan status di admin
        ->latest()
        ->paginate(12);

    return view('user.dashboard.produk', compact('products'));
}


    public function show()
    {
        return view('user.brand.detail');
    }

  
}
