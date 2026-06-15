<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Kemeja Batik Pria',
                'deskripsi' => 'Kemeja batik pria motif elegan',
                'harga' => 150000,
                'stok' => 10,
                'kategori' => 'baju',
                'gambar' => 'images/products/kemeja-batik-pria-elegan-Batik-Talenta-Exclusive-709x1024.webp',
            ],
            [
                'nama' => 'Kaos Polos Wanita',
                'deskripsi' => 'Kaos polos wanita berbagai warna',
                'harga' => 85000,
                'stok' => 20,
                'kategori' => 'baju',
                'gambar' => 'images/products/kaos-polos-wanita.jpg',
            ],
            [
                'nama' => 'Celana Jeans Pria',
                'deskripsi' => 'Celana jeans pria slim fit',
                'harga' => 200000,
                'stok' => 15,
                'kategori' => 'celana',
                'gambar' => 'images/products/celana-jeans-pria.webp',
            ],
            [
                'nama' => 'Celana Kulot Wanita',
                'deskripsi' => 'Celana kulot wanita terbaru',
                'harga' => 175000,
                'stok' => 8,
                'kategori' => 'celana',
                'gambar' => 'images/products/Celana-Kulot-Wanita-Terbaru-Warna-Hitam.jpg',
            ],
            [
                'nama' => 'Topi Sneakers',
                'deskripsi' => 'Topi sneakers unisex',
                'harga' => 75000,
                'stok' => 25,
                'kategori' => 'aksesoris',
                'gambar' => 'images/products/topi-sneakers.jpg',
            ],
            [
                'nama' => 'Ikat Pinggang Kulit',
                'deskripsi' => 'Ikat pinggang kulit asli',
                'harga' => 120000,
                'stok' => 12,
                'kategori' => 'aksesoris',
                'gambar' => 'images/products/ikat-pinggang-kulit.webp',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}