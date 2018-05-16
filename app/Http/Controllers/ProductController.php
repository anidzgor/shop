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
            //for payment id
            //$order->payment_id = $charge->idate
            Auth::user()->orders()->save($order);
        } catch(Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully purchased products');
        // Stripe::setApiKey("sk_test_XdAOrztb8gm49OInHb6elINB");
        // $customer = Customer::create(array(
        //     'email' => $request->stripeEmail,
        //     'source'  => $request->stripeToken
        // ));
        // $charge = Charge::create(array(
        //     'customer' => $customer->id,
        //     'amount'   => $cart->totalPrice,
        //     'currency' => 'usd'
        // ));
        //Session::forget('cart');
        //return redirect()->route('home')->with('success', 'Successfully purchased products');
        // if(!Session::has('cart')) {
        //     return redirect()->route('product.shoppingCart');
        // }
        // $oldCart = Session::get('cart');
        // $cart = new Cart($oldCart);
        // Stripe::setApiKey('sk_test_XdAOrztb8gm49OInHb6elINB');
        // try {
        //     Charge::create(array(
        //         "amount" => $cart->totalPrice,
        //         "currency" => "usd",
        //         "source" => $request->input('stripeToken'),
        //         "description" => "Test Charge"
        //       ));
        // } catch(\Exception $e) {
        //     return redirect()->route('checkout')->with('error', $e->getMessage());
        // }
        // Session::forget('cart');
        //return redirect()->route('product.index')->with('success', 'Successfully purchased products');
    }
}
