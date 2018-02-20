<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//    public function getProducts(){
//        $products = Product::all();
//        return view:make('product_list')->with('products', $products)
//        ]);
//    }
    
    public function getProducts(){
        $products = Product::all();
        return view('shop.products')->with('products', $products);
    }
}