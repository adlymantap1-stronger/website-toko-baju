<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(6)->get();
        
        $carts = collect();
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())
                         ->with('product')
                         ->get();
        }
        
        return view('home', compact('products', 'carts'));
    }
}