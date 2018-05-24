<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

class PagesController extends Controller
{
    public function getHome() {
        $products = Product::all();
        $productsLatest = Product::orderBy('id', 'desc')->take(4)->get();
        $productBestSeller = Product::orderBy('amount_sell', 'desc')->take(4)->get();

        return view('home')->with(['products' => $products, 'productsLatest' => $productsLatest,
                                    'productBestSeller' => $productBestSeller]);
      }
  
      public function getAbout() {
        return view('about');
      }
  
      public function getContact() {
        return view('contact');
      }

      public function getProducts() {
        $dresses = Product::where('id_category', 3)->get();
        $shirts = Product::where('id_category', 1)->get();
        $jeans = Product::where('id_category', 4)->get();

        return view('products')->with(['dresses' => $dresses,
                                       'shirts' => $shirts,
                                        'jeans' => $jeans]);
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
