<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Baju Adly</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow p-8 w-full max-w-md">
        
        {{-- Logo --}}
        <div class="text-center mb-6">
            <a href="/" class="text-2xl font-bold text-blue-600">Toko Baju Adly 👕</a>
            <p class="text-gray-500 mt-1">Login ke akun kamu</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Email Anda" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan password Anda" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Login --}}
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Login
            </button>

            {{-- Link Register --}}
            <p class="text-center text-gray-500 mt-4">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
            </p>

        </form>
    </div>
</div>

</body>
</html>