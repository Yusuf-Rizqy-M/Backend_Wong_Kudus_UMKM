<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $baseUrl = 'uploads/categories/';

        $categories = [
            [
                'name' => 'Makanan',
                'icon' => $baseUrl . 'makanan.png',
                'desc' => 'Beragam produk kuliner khas Kudus seperti nasi pindang, lentog tanjung, dan soto kudus.'
            ],
            [
                'name' => 'Minuman',
                'icon' => $baseUrl . 'minuman.png',
                'desc' => 'Minuman segar seperti kopi kudus, jus buah, es dawet, dan minuman herbal lokal.'
            ],
            [
                'name' => 'Jasa',
                'icon' => $baseUrl . 'jasa.png',
                'desc' => 'Layanan usaha seperti laundry, sablon, servis kendaraan, dan jasa pengantaran.'
            ],
                        [
                'name' => 'Lainnya',
                'icon' => $baseUrl . 'lainnya.png',
                'desc' => 'Kategori untuk item atau produk yang tidak termasuk dalam kategori utama lainnya.'
            ],
        ];

        foreach ($categories as $data) {
            Category::updateOrCreate(
                ['name' => $data['name']],
                [
                    'icon' => $data['icon'],
                    'desc' => $data['desc'],
                ]
            );
        }
    }
}
