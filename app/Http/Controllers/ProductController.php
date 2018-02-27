<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public function getProducts(){
        $products = Product::all();
        return view('shop.products')->with('products', $products);
    }
    
    public function getAddToCart(Request $request, $product_id) {
        $product = Product::find($product_id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->product_id);
        
        $request->session()->put('cart', $cart);
        dd($request->session()->get('cart'));
        return redirect()->route('shop.products');
    }
}