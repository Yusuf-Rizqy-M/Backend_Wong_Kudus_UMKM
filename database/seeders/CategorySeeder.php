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
                'name' => 'Barang',
                'icon' => $baseUrl . 'barang.png',
                'desc' => 'Produk barang seperti pakaian, kerajinan tangan, alat rumah tangga, dan souvenir khas Kudus.'
            ],
            [
                'name' => 'Peternakan',
                'icon' => $baseUrl . 'peternakan.png',
                'desc' => 'Produk hasil peternakan seperti telur, susu, daging, dan olahannya dari peternak lokal.'
            ],
            // [
            //     'name' => 'Pertanian',
            //     'icon' => $baseUrl . 'pertanian.png',
            //     'desc' => 'Hasil panen lokal seperti sayuran segar, buah, padi, dan tanaman hias.'
            // ],
            [
                'name' => 'Fashion',
                'icon' => $baseUrl . 'fashion.png',
                'desc' => 'Produk pakaian, sepatu, tas, dan aksesoris buatan pengrajin lokal.'
            ],
            // [
            //     'name' => 'Kerajinan',
            //     'icon' => $baseUrl . 'kerajinan.png',
            //     'desc' => 'Hasil karya tangan seperti batik Kudus, ukiran kayu, dan produk kreatif lainnya.'
            // ],
            [
                'name' => 'Teknologi',
                'icon' => $baseUrl . 'teknologi.png',
                'desc' => 'Produk dan layanan teknologi seperti toko komputer, servis HP, dan pengembangan software.'
            ],
            [
                'name' => 'Otomotif',
                'icon' => $baseUrl . 'otomotif.png',
                'desc' => 'Usaha yang bergerak di bidang kendaraan seperti bengkel motor, mobil, dan penjualan sparepart.'
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
