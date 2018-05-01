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
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    // show products on shop page where status = available
    public function getProducts(Request $request){
        if ($request->search) {
            $products = $this->searchProducts($request->search);
        } else {
            $products = Product::where('status', '=', 'available')->get();
        }
        return view('shop.products')->with('products', $products);
    }
    
//    search products
    public function searchProducts($search)
    {
        $products = Product::where('productName', 'LIKE', '%'.$search.'%')->get();

        return $products;
    }

//    results from search
    public function submitSearch(Request $request)
    {
//        dd($request->queryString);
        return redirect('/shop-products?search=' . $request->queryString);
    }
    
    // show view for selected product details
    public function showProduct($id) {
        $product = Product::where('id', $id)->firstOrFail();
        return view('shop.item')->with('product', $product);
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
    
//    public function randomItems(){
//        $mightLike = collect(Product::where('status', '=', 'available'))->random(4);
//        return view('shop.cart')->with('mightLike', $mightLike);
//    }
    
//    reduce cart item
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
    
//    increase cart item
    public function getIncreaseByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);
        
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }
    
//    remove cart item
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
    
//    post checkout inputs to database
    public function postCheckout(Request $request) {
        if (!Session::has('cart')) {
            return view('shop.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        $this->validate($request, [
            'custName' => 
                array(
                    'required',
                    'regex:/(^[A-Za-z0-9 ]+$)+/'
                    ),
            'shipLine1' => 
                array(
                    'required',
                    'regex:/(^[A-Za-z0-9 ]+$)+/'
                    ),
            'shipLine2' => 
                array(
                    'regex:/(^[A-Za-z0-9 ]+$)+/',
                    'nullable'
                    ),
            'shipCity' => 'required|alpha',
            'shipState' => 'required|alpha',
            'shipZip' => 'required|numeric'
        ]);
        
//        stripe checkout
        Stripe::setApiKey('sk_test_YfQUoYnGFgrzrtXSPnNA5hA3');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test charge"
            ));
            
//            store order to database
            $carbon = Carbon::today();
            $order = new Order([
                'cart' => serialize($cart),
                'custName' => $request->input('custName'),
                'shipLine1' => $request->input('shipLine1'),
                'shipLine2' => $request->input('shipLine2'),
                'shipCity' => $request->input('shipCity'),
                'shipState' => $request->input('shipState'),
                'shipZip' => $request->input('shipZip'),
                'orderDate' => $carbon,
                'payment_id' => $charge->id
            ]);
            Auth::user()->orders()->save($order);
        } 
        catch (Exception $e) {
            return redirect()->route('checkout');
        }
        
        Session::forget('cart');
        return redirect()->route('index')->with('success', 'Your order has been successfully placed! Thank you!');
    }
    
//    version 2 successful checkout view
//    public function successfulCheckout() {
//        return view ('shop.successful-checkout');
//    }
    
    // ADMIN ONLY
    // add a product view
    public function getProductForm() {
//        if the user is logged in and role is admin
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view ('shop.add-product');
        }
//        guests and users see unauthorized access page
        else {
            return view('errors.unauthorized');
        }
    }
    
    // post new product info to database
    public function postAddProduct(Request $request) {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $this->validate($request, [
                'productName' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                    ),
                'image1' => 
                    array(
                        'required',
                        'url'
                    ),
                'image2' => 
                    array(
                        'required',
                        'url'
                    ),
                'image3' => 
                    array(
                        'nullable',
                        'url'
                        ),
                'image4' =>
                    array(
                        'nullable',
                        'url'
                        ),
                'description' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'materials' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'dimensions' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'category' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'price' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        )
            ]);

//            store product to database
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
        } else {
            return view('errors.unauthorized');
        }
    }
    
    // show all product info
    public function getProductsInfo() {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $products = Product::all();
            return view('shop.manage-products')->with('products', $products);
        } else {
            return view('errors.unauthorized');
        }
    }
    
    // edit form for selected product
    public function editProduct($id)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $product = Product::find($id);
            return view('shop.edit-product', compact('product', 'id'));
        } else {
            return view('errors.unauthorized');
        }
    }
    
    // send updated product info to database
    public function updateProduct(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $product = Product::find($id);
            $this->validate(request(), [
                'productName' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'image1' => 
                    array(
                        'required',
                        'url'
                        ),
                'image2' => 
                    array(
                        'required',
                        'url'
                        ),
                'image3' =>
                    array(
                        'nullable',
                        'url'
                        ),
                'image4' =>
                    array(
                        'nullable',
                        'url'
                        ),
                'description' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'materials' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'dimensions' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'category' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
                'price' => 
                    array(
                        'required',
                        'regex:/(^[A-Za-z0-9 ]+$)+/'
                        ),
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
        } else {
            return view('errors.unauthorized');
        }
    }
    
    // delete selected product
    public function deleteProduct($id)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $product = Product::find($id);
            $product->delete();
            return redirect('manage-products')->with('success', 'Product has been deleted');
        } else {
            return view('errors.unauthorized');
        }
    }
    
//    show all orders
    public function getAllOrders() {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $orders = Order::all();
            $orders->transform(function($order, $key) {
                $order->cart = unserialize($order->cart);
                return $order;
            });
            return view('shop.manage-orders', ['orders' => $orders]);
        } else {
            return view('errors.unauthorized');
        }
    }
    
//    public function updateOrderStatus(Request $request, $id) {
//        if (Auth::check() && Auth::user()->role == 'admin') {
//            $order = Order::find($id);
//            $order->orderStatus = $request->input('orderStatus');
//            $order->updated_at = now();
//            $order->save();
//            return redirect('manage-orders')->with('success', 'Order status has been updated!');
//        } else {
//            return view('errors.unauthorized');
//        }
//    }
}