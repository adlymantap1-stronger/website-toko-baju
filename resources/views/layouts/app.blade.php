<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Toko Baju</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    {{-- Navbar --}}
    <nav class="bg-white shadow border-b border-gray-200 px-6 py-4 flex justify-between items-center w-full">
        <a href="/" class="text-xl font-bold text-blue-600">Toko Baju Adly</a>
        <div class="flex gap-4 items-center">
            <a href="#home" class="text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 pb-1">Home</a>
            <a href="#produk-terbaru" class="text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 pb-1">Produk</a>
            <a href="#cart" class="text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 pb-1">Keranjang</a>
            <a href="#contact" class="text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 pb-1">Contact</a>

            {{-- Auth Links --}}
         @auth
    @if(Auth::user()->isAdmin())
    <a href="/admin" class="text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 pb-1">
        Hi, {{ Auth::user()->name }}! 👑
    </a>
    @else
    <span class="text-gray-600">Hi, {{ Auth::user()->name }}!</span>
    @endif
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
    </form>
        @else
    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 pb-1">Login</a>
    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
        @endauth
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    {{-- Konten Halaman --}}
    <footer></footer>

    @stack('scripts')
</body>
</html>