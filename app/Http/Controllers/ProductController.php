<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;
use App\Cart;
use App\Order;
use Auth;

use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::find($id);

        $sizes = Product::join('sizes', 'products.id_size', '=', 'sizes.id')->
            select('sizes.name', 'products.id')->where(['title' => $product->title, 'id_color' => $product->id_color])->get();

        $colors = Product::join('colors', 'products.id_color', '=', 'colors.id')->
            select('colors.name', 'products.id')->where(['title' => $product->title])->get();

        $currentColor = Product::join('colors', 'products.id_color', '=', 'colors.id')->
            select('colors.name')->where(['title' => $product->title, 'id_color' => $product->id_color])->distinct()->get();

        return view('products.show')->with(['product' => $product,
                                            'sizes' => $sizes,
                                            'colors' => $colors->unique('name'),
                                            'currentColor' => $currentColor[0]['name']]);
    }

    public function getAddToCart(Request $request, $id) {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getCart() {
        if(!Session::has('cart')) {
            return view('shopping-cart');
        }
        
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('/shopping-cart')->with(['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() {
        if(!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('checkout')->with('total', $total);
    }

    public function postCheckout(Request $request) {
        if(!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        try {
            $order = new Order();
            $order->cart = serialize($cart);    //good method for storing object in database, reverse is method unserialize
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            Auth::user()->orders()->save($order);   //For logged user save specific order
        } catch(Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully purchased products');
    }
}
