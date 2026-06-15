<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())
                     ->with('product')
                     ->get();
        return view('cart', compact('carts'));
    }

    public function store(Request $request)
    {
        $cart = Cart::where('user_id', auth::id())
                    ->where('product_id', $request->product_id)
                    ->first();

        if ($cart) {
            $cart->increment('jumlah');
        } else {
            Cart::create([
                'user_id' => auth::id(),
                'product_id' => $request->product_id,
                'jumlah' => 1,
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function destroy(int $id)
{
    $cart = Cart::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

    if ($cart) {
        if ($cart->jumlah > 1) {
            $cart->decrement('jumlah');
        } else {
            $cart->delete();
        }
    }

    return back()->with('success', 'Produk diperbarui!');
}

   public function checkout()
{
    $carts = Cart::where('user_id', auth::id())
        ->with('product')
        ->get();

    $total = $carts->sum(function ($cart) {
        return $cart->product->harga * $cart->jumlah;
    });

    return view('checkout', compact('carts', 'total'));
}

    public function processCheckout()
{
    Cart::where('user_id', auth::id())->delete();

    return redirect('/')->with('success', 'Pembayaran berhasil!');
}

}