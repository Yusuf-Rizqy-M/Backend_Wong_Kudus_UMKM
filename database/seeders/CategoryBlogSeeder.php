<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryBlog;

class CategoryBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendefinisikan data kategori dalam array
        $categories = [
            [
                'title' => 'Berita Daerah',
                'description' => 'Berita daerah',
                'status' => 'active',
            ],
            [
                'title' => 'UMKM',
                'description' => 'Berita dan informasi seputar UMKM (Usaha Mikro Kecil dan Menengah)',
                'status' => 'active',
            ],
        ];

        // Looping data dan menggunakan updateOrCreate
        // Ini akan membuat data baru, atau meng-update data jika 'title' sudah ada
        // Mencegah duplikasi jika seeder dijalankan berkali-kali
        foreach ($categories as $data) {
            CategoryBlog::updateOrCreate(
                ['title' => $data['title']], // Kunci unik untuk pengecekan
                [
                    'description' => $data['description'], // Data yang akan diisi/diperbarui
                    'status' => $data['status'],
                ]
            );
        }
    }
}