<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $basePath = 'uploads/categories/';

        $categories = [
            [
                'name' => 'Makanan',
                'icon' => $basePath . 'makanan.png',
                'desc' => 'Beragam produk kuliner khas Kudus seperti nasi pindang, lentog tanjung, dan soto kudus.'
            ],
            [
                'name' => 'Minuman',
                'icon' => $basePath . 'minuman.png',
                'desc' => 'Minuman segar seperti kopi kudus, jus buah, es dawet, dan minuman herbal lokal.'
            ],
            [
                'name' => 'Jasa',
                'icon' => $basePath . 'jasa.png',
                'desc' => 'Layanan usaha seperti laundry, sablon, servis kendaraan, dan jasa pengantaran.'
            ],
            [
                'name' => 'Barang',
                'icon' => $basePath . 'barang.png',
                'desc' => 'Produk fisik seperti makanan kemasan, pakaian, kerajinan tangan, dan kebutuhan lainnya.'
            ],
            [
                'name' => 'Lainnya',
                'icon' => $basePath . 'lainnya.png',
                'desc' => 'Kategori untuk item yang tidak termasuk kategori utama lainnya.'
            ],
        ];

        foreach ($categories as $data) {
            Category::updateOrCreate(
                ['name' => $data['name']],
                [
                    'icon' => $data['icon'],
                    'desc' => $data['desc'],
                    'status' => 'active'
                ]
            );
        }
    }
}
