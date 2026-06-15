<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect('/')->with('error', 'Kamu tidak punya akses!');
        }

        $users = User::latest()->get();
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Cart::count();

        return view('admin.dashboard', compact('users', 'totalUsers', 'totalProducts', 'totalOrders'));
    }
}