<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
}
