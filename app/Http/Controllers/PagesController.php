<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

class PagesController extends Controller
{
    public function getHome() {

        $products = Product::all();

        return view('home')->with('products', $products);
      }
  
      public function getAbout() {
        return view('about');
      }
  
      public function getContact() {
        return view('contact');
      }

      public function getDashboard() {

          $orders = Auth::user()->orders;
          $orders->transform(function($order, $key) {
              $order->cart = unserialize($order->cart);
              return $order;
          });

          return view('dashboard')->with('orders', $orders);

      }
}
