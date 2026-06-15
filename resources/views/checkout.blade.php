@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf

        {{-- Judul --}}
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Checkout
        </h1>

        {{-- Metode Pembayaran --}}
        <h2 class="text-lg font-semibold text-gray-700 mb-4">
            Pilih Metode Pembayaran
        </h2>

        <div class="space-y-4">
            <label class="flex items-center gap-3 border p-4 rounded-lg cursor-pointer hover:bg-gray-50">
                <input type="radio" name="payment" value="cod" required>
                <span>💵 Cash On Delivery (COD)</span>
            </label>

            <label class="flex items-center gap-3 border p-4 rounded-lg cursor-pointer hover:bg-gray-50">
                <input type="radio" name="payment" value="bank" required>
                <span>🏦 Transfer Bank</span>
            </label>

            <label class="flex items-center gap-3 border p-4 rounded-lg cursor-pointer hover:bg-gray-50">
                <input type="radio" name="payment" value="ewallet" required>
                <span>📱 E-Wallet</span>
            </label>
        </div>

        {{-- Total Harga --}}
        <div class="mt-6 border-t pt-4">
            <div class="flex justify-between items-center">
                <span class="text-lg font-semibold text-gray-700">
                    Total Harga
                </span>
                <span class="text-xl font-bold text-black">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </span>
            </div>
        </div>

        {{-- Tombol Bayar --}}
        <button
    type="submit"
    class="w-full mt-6 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
    Bayar Sekarang
    </button>
    </form>

</div>
@endsection