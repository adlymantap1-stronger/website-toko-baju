<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Toko Baju Adly</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow p-8 w-full max-w-md">
        
        {{-- Logo --}}
        <div class="text-center mb-6">
            <a href="/" class="text-2xl font-bold text-blue-600">Toko Baju Adly 👕</a>
            <p class="text-gray-500 mt-1">Buat akun baru</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nama lengkap kamu" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Email kamu" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Password kamu" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ulangi password kamu" required>
            </div>

            {{-- Tombol Register --}}
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Register
            </button>

            {{-- Link Login --}}
            <p class="text-center text-gray-500 mt-4">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
            </p>

        </form>
    </div>
</div>

</body>
</html>