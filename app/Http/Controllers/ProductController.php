<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    // show products on shop page where status = available
    public function getProducts(){
        $products = Product::where('status', '=', 'available')->get();
        return view('shop.products')->with('products', $products);
    }
    
    // add selected item to cart
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        
        $request->session()->put('cart', $cart);
        return redirect()->route('shop.products');
    }
    
    // show cart view with item info
    public function getCart() {
        if (!Session::has('cart')) {
            return view('shop.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
    // get the checkout view with cart info
    public function getCheckout() {
        if (!Session::has('cart')) {
            return view('shop.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }
    
    public function postCheckout(Request $request) {
        if (!Session::has('cart')) {
            return view('shop.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        Stripe::setApiKey('sk_test_YfQUoYnGFgrzrtXSPnNA5hA3');
        try {
            Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test charge"
            ));
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        
        Session::forget('cart');
        return redirect()->route('index')->with('success', 'Successful purchase.');
    }
    
    // admin functions
    // add a product view
    public function getProductForm() {
        return view ('shop.add-product');
    }
    
    // post new product info to database
    public function postAddProduct(Request $request) {
        $this->validate($request, [
            'productName' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'description' => 'required',
            'materials' => 'required',
            'dimensions' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);
        
        $product = new Product([
            'productName' => $request->input('productName'),
            'image1' => $request->input('image1'),
            'image2' => $request->input('image2'),
            'image3' => $request->input('image3'),
            'image4' => $request->input('image4'),
            'description' => $request->input('description'),
            'materials' => $request->input('materials'),
            'dimensions' => $request->input('dimensions'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
            'status' => 'available'
        ]);
        $product->save();
        
        return redirect()->route('add-product')->with('success', 'New product has been added!');
    }
    
    // show all product info
    public function getProductsInfo() {
        $products = Product::all();
        return view('shop.manage-products')->with('products', $products);
    }
    
    // edit form for selected product
    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('shop.edit-product', compact('product', 'id'));
    }
    
    // send updated product info to database
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $this->validate(request(), [
            'productName' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'description' => 'required',
            'materials' => 'required',
            'dimensions' => 'required',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);
        $product->productName = $request->input('productName');
        $product->image1 = $request->input('image1');
        $product->image2 = $request->input('image2');
        $product->image3 = $request->input('image3');
        $product->image4 = $request->input('image4');
        $product->description = $request->input('description');
        $product->materials = $request->input('materials');
        $product->dimensions = $request->input('dimensions');
        $product->category = $request->input('category');
        $product->status = $request->input('status');
        $product->save();
        return redirect('manage-products')->with('success', 'Product has been updated!');
    }
    
    // delete selected product
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('manage-products')->with('success', 'Product has been deleted');
    }
}