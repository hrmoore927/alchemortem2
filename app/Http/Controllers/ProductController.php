<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(){
        $products = Product::all();
        return view('shop.products', [
            'products' => $products
        ]);
    }
}
