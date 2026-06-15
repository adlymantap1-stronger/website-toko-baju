@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Semua Produk</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow hover:shadow-md transition">
            <img src="{{ asset($product->gambar) }}" 
                 alt="{{ $product->nama }}" 
                 class="w-full rounded-t-lg object-cover h-48">
            <div class="p-4">
                <h2 class="font-semibold text-gray-800">{{ $product->nama }}</h2>
                <p class="text-gray-500 text-sm mt-1">{{ $product->deskripsi }}</p>
                <p class="text-blue-600 font-bold mt-2">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                <p class="text-gray-400 text-sm">Stok: {{ $product->stok }}</p>
                <button class="mt-3 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
        @endforeach
    </div>
@endsection