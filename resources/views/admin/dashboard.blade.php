@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin 👑</h1>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-4xl font-bold text-blue-600">{{ $totalUsers }}</p>
            <p class="text-gray-500 mt-2">Total User</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-4xl font-bold text-green-600">{{ $totalProducts }}</p>
            <p class="text-gray-500 mt-2">Total Produk</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-4xl font-bold text-purple-600">{{ $totalOrders }}</p>
            <p class="text-gray-500 mt-2">Total Keranjang</p>
        </div>
    </div>

    {{-- Daftar User --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Daftar User 👥</h2>
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-3 text-gray-600">#</th>
                    <th class="text-left py-3 text-gray-600">Nama</th>
                    <th class="text-left py-3 text-gray-600">Email</th>
                    <th class="text-left py-3 text-gray-600">Bergabung</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 text-gray-600">{{ $loop->iteration }}</td>
                    <td class="py-3 font-semibold text-gray-800">{{ $user->name }}</td>
                    <td class="py-3 text-gray-600">{{ $user->email }}</td>
                    <td class="py-3 text-gray-400">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection