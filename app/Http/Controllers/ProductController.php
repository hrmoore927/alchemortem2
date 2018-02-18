<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(){
        $products = Product::all();
        return view:make('product_list')->with('products', $products)
        ]);
    }
}
