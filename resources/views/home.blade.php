@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="text-center py-20" id="home">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            Selamat Datang di Toko Baju! Adly 👕
        </h1>
        <p class="text-gray-500 text-lg mb-8">
            Temukan baju terbaik dengan harga yang Berkualitas
        </p>
        <a href="#produk-terbaru" 
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Lihat Produk
        </a>
    </div>

    {{-- Section Produk --}}
    <div class="mt-10" id="produk-terbaru">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow hover:shadow-md transition">
        <img src="{{ asset($product->gambar) }}" 
             alt="{{ $product->nama }}" 
             class="w-full rounded-t-lg object-cover h-48">
        <div class="p-4">
            <h2 class="font-semibold text-gray-800">{{ $product->nama }}</h2>
            <p class="text-blue-600 font-bold mt-1">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            
          @auth
    <button 
    onclick="addToCart({{ $product->id }})"
    class="mt-3 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
    Tambah ke Keranjang
    </button>
   @else
    <a href="{{ route('login') }}" class="mt-3 block text-center w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-gray-600">
    Login untuk Beli
    </a>
    @endauth
             </div>
            </div>
          @endforeach
        </div>
    </div>

    {{-- Section Keranjang --}}
<div class="mt-16" id="cart">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Keranjang Belanja 🛒</h2>
    
    @auth
        @if($carts->count() > 0)
        <div class="bg-white rounded-lg shadow p-6">
            @foreach($carts as $cart)
            <div class="flex items-center justify-between border-b py-4">
                <div class="flex items-center gap-4">
                    <img src="{{ asset($cart->product->gambar) }}" 
                         class="w-16 h-16 object-cover rounded-lg">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $cart->product->nama }}</h3>
                        <p class="text-blue-600">Rp {{ number_format($cart->product->harga, 0, ',', '.') }}</p>
                        <p class="text-gray-400 text-sm">Jumlah: {{ $cart->jumlah }}</p>
                    </div>
                </div>
                <button onclick="removeFromCart({{ $cart->id }})"class="text-red-500 hover:text-red-700">Hapus</button>
            </div>
            @endforeach

            {{-- Total --}}
            <div class="mt-4 text-right">
                <p class="text-xl font-bold text-gray-800">
                    Total: Rp {{ number_format($carts->sum(fn($c) => $c->product->harga * $c->jumlah), 0, ',', '.') }}
                </p>
                <a href="{{ route('checkout') }}" class="inline-block mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Checkout</a>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-gray-500 text-center py-10">Keranjang kamu masih kosong!</p>
        </div>
        @endif
    @else
    <div class="bg-white rounded-lg shadow p-6">
        <p class="text-gray-500 text-center py-10">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a> untuk melihat keranjang!
        </p>
    </div>
    @endauth
</div>

    {{-- Section Contact --}}
    <div class="mt-16" id="contact">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Kontak Kami 📩</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            {{-- Info Kontak --}}
            <div class="bg-white rounded-lg shadow p-6 space-y-6">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-100 p-3 rounded-full">📞</div>
                    <div>
                        <p class="text-gray-500 text-sm">Nomor HP</p>
                        <p class="font-semibold text-gray-800">+62 813-8360-4504</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-pink-100 p-3 rounded-full">📸</div>
                    <div>
                        <p class="text-gray-500 text-sm">Instagram</p>
                        <a href="https://instagram.com/adly.r.f" target="_blank"
                           class="font-semibold text-blue-600 hover:underline">@adly.r.f</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 p-3 rounded-full">💬</div>
                    <div>
                        <p class="text-gray-500 text-sm">WhatsApp</p>
                        <a href="https://wa.me/6281383604504" target="_blank"
                           class="font-semibold text-blue-600 hover:underline">+62 813-8360-4504</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-blue-100 p-3 rounded-full">👤</div>
                    <div>
                        <p class="text-gray-500 text-sm">TikTok</p>
                        <a href="https://tiktok.com/@aldykaciw1" target="_blank"
                           class="font-semibold text-blue-600 hover:underline">@aldykaciw1</a>
                    </div>
                </div>
            </div>

            {{-- Google Maps --}}
            <div class="bg-white rounded-lg shadow p-6">
                <p class="font-semibold text-gray-800 mb-3">📍 Lokasi Toko</p>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=YOUR_MAPS_EMBED_URL"
                    width="100%" 
                    height="350" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"
                    class="rounded-lg">
                </iframe>
            </div>

        </div>
    </div>
    <script>
    function addToCart(productId) {
        axios.post('/cart/add', {
            product_id: productId,
            _token: '{{ csrf_token() }}'
        })
        .then(response => {
            location.reload();
        })
        .catch(error => {
            console.error(error);
        });
    }

    function removeFromCart(cartId) {
    axios.post('/cart/' + cartId, {
        _token: '{{ csrf_token() }}',
        _method: 'DELETE'
    })
    .then(response => {
        location.reload();
    })
    .catch(error => {
        console.error(error);
    });
    }
    </script>

        @if(session('success'))
    <script>
    alert("{{ session('success') }}");
    </script>
    @endif
    @endsection
