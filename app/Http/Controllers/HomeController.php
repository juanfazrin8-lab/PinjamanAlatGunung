<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
         $isLight = session('theme', 'dark') === 'light';

        // Data kategori
        $categories = [
            ['icon' => 'tent', 'name' => 'Tenda', 'slug' => 'tenda', 'total' => ' 2 item'],
            ['icon' => 'backpack', 'name' => 'Tas & Carrier', 'slug' => 'tas-carrier', 'total' => '5 item'],
            ['icon' => 'bed', 'name' => 'Perlengkapan Tidur', 'slug' => 'perlengkapan-tidur', 'total' => '4 item'],
            ['icon' => 'utensils', 'name' => 'Peralatan Memasak', 'slug' => 'peralatan-memasak', 'total' => '12 item'],
            ['icon' => 'shirt', 'name' => 'Pakaian Pendakian', 'slug' => 'pakaian-pendakian', 'total' => '20 item'],
        ];

        // Data produk
        $products = [
        [
            'name' => 'Tenda Dome 4 Orang',
            'category' => 'tenda',
            'price' => '75.000',
            'image' => 'https://images.unsplash.com/photo-1426604966848-d7adacbd02bf?auto=format&fit=crop&w=300&q=80',
        ],
        [
            'name' => 'Carrier 60 Liter',
            'category' => 'tas-carrier',
            'price' => '50.000',
            'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=300&q=80',
        ],
        [
            'name' => 'Sleeping Bag Ultralight',
            'category' => 'perlengkapan-tidur',
            'price' => '30.000',
            'image' => 'https://images.unsplash.com/photo-1520263880548-0d14b4e54d24?auto=format&fit=crop&w=300&q=80',
        ],
        [
            'name' => 'Trekking Pole Carbon',
            'category' => 'peralatan-memasak', // Sesuaikan kategorinya
            'price' => '20.000',
            'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=300&q=80',
        ],
        [
            'name' => 'Gas Kaleng Canister',
            'category' => 'peralatan-memasak',
            'price' => '25.000',
            'image' => 'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=300&q=80',
        ],
        [
            'name' => 'Sepatu Hiking Waterproof',
            'category' => 'pakaian-pendakian',
            'price' => '60.000',
            'image' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=300&q=80',
        ],
        [
            'name' => 'Headlamp LED 400 Lumens',
            'category' => 'tenda',
            'price' => '15.000',
            'image' => 'https://images.unsplash.com/photo-1510312305653-8ed496efae75?auto=format&fit=crop&w=300&q=80',
        ],
        [
            'name' => 'Matras Aluminium Foil',
            'category' => 'perlengkapan-tidur',
            'price' => '10.000',
            'image' => 'https://images.unsplash.com/photo-1508873696983-2df5c920aac9?auto=format&fit=crop&w=300&q=80',
        ],
    ];

    // Ambil kategori yang sedang dipilih dari URL (jika ada)
    $selectedCategory = $request->input('category');

    // 2. Ambil input kata kunci pencarian dari URL (name="cari")
        $keyword = $request->input('cari');

    // Jika user mengeklik kategori tertentu, saring array produknya
    if ($selectedCategory) {
        $products = array_filter($products, function ($product) use ($selectedCategory) {
            return $product['category'] === $selectedCategory;
        });
    }

    // Filter berdasarkan Kata Kunci Pencarian (jika diketik oleh user)
        if ($keyword) {
            $products = array_filter($products, function ($product) use ($keyword) {
                // Menggunakan str_insensitive agar pencarian tidak case-sensitive (huruf besar/kecil tetap ketemu)
                return stripos($product['name'], $keyword) !== false;
            });
        }

    return view('home', compact('isLight', 'categories', 'products', 'selectedCategory'));
}
}

   
