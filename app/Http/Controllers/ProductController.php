<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Http\Requests;
use Stripe\Charge;
use Stripe\Stripe;
use ShoppingCart;
use App\Mail\OrderReceived;

class ProductController extends Controller
{
    // show products on shop page where status = available
    public function getProducts(){
        $products = Product::where('status', '=', 'available')->get();
        return view('shop.products')->with('products', $products);
    }
    
    // show view for selected product details
    public function showProduct($id) {
        $product = Product::where('id', $id)->firstOrFail();
        return view('shop.item')->with('product', $product);
    }
    
    public function sortPrice(Request $request) {
        $value = $request->input('sortPrice');
        if ($value == 'asc') {
            $products = Product::where('status', '=', 'available')->orderBy('price', 'asc')->get();
            $sorted = $products->sortBy('price');
            $sorted->values()->all(); 
            return view('sort.asc.products')->with('products', $products);
        } else {
            $products = Product::where('status', '=', 'available')->orderBy('price', 'desc')->get();
            $sorted = $products->sortByDesc('price');
            $sorted->values()->all();
            return view('sort.desc.products')->with('products', $products);
        } 
        
    }
    
    // add selected item to cart
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        
        $request->session()->put('cart', $cart);
        return redirect()->back();
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
    
    public function randomItems(){
        $mightLike = collect(Product::where('status', '=', 'available'))->random(4);
        return view('shop.cart')->with('mightLike', $mightLike);
    }
    
    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('cart');
    }
    
    public function getIncreaseByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);
        
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }
    
    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('cart');
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
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test charge"
            ));
            
            $order = new Order([
                'cart' => serialize($cart),
                'custName' => $request->input('custName'),
                'shipLine1' => $request->input('shipLine1'),
                'shipLine2' => $request->input('shipLine2'),
                'shipCity' => $request->input('shipCity'),
                'shipState' => $request->input('shipState'),
                'shipZip' => $request->input('shipZip'),
                'payment_id' => $charge->id
            ]);
            Auth::user()->orders()->save($order);
//            Mail::send(new OrderReceived);
        } 
        catch (Exception $e) {
            return redirect()->route('checkout');
        }
        
        Session::forget('cart');
        return redirect()->route('index')->with('success', 'Your order has been successfully placed! Thank you!');
    }
    
    public function successfulCheckout() {
        return view ('shop.successful-checkout');
    }
    
    // ADMIN ONLY
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
    
    public function getAllOrders() {
        $orders = Order::all();
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('shop.manage-orders', ['orders' => $orders]);
    }
    
    public function updateOrderStatus(Request $request, $id) {
        $order = Order::find($id);
        $order->orderStatus = $request->input('orderStatus');
        $order->save();
        return redirect('manage-orders')->with('success', 'Order status has been updated!');
    }
}