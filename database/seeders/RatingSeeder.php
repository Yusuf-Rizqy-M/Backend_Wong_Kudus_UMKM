<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rating_website')->insert([
            [
                'name' => 'Timothy',
                'name_last' => 'Ronald',
                'email' => 'timothy.ronald@gmail.com',
                'rating' => 5,
                'photo_profil' => 'uploads/rating_photos/timothy.jpg',
                'comment' => 'Website UMKM Wong Kudus ini luar biasa! Desainnya clean dan informatif banget. Salut buat tim developernya!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gabriel',
                'name_last' => 'Rey',
                'email' => 'gabriel@rey.com',
                'rating' => 5,
                'photo_profil' => 'uploads/rating_photos/gabriel.png',
                'comment' => 'Keren banget! Website-nya bikin bangga produk lokal Kudus. Semoga makin maju terus UMKM di sini!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andre',
                'name_last' => 'Onana',
                'email' => 'andre@onana.com',
                'rating' => 4.8,
                'photo_profil' => 'uploads/rating_photos/onana.png',
                'comment' => 'Sebagai orang luar negeri, saya kagum. Website ini modern dan mudah digunakan!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prof',
                'name_last' => 'Kalimasada',
                'email' => 'kalimasada@prof.com',
                'rating' => 5,
                'photo_profil' => 'uploads/rating_photos/kalimasada.jpg',
                'comment' => 'Website-nya sangat profesional! Cocok dijadikan contoh untuk UMKM lain di Indonesia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Najwa',
                'name_last' => 'Shihab',
                'email' => 'najwa@shihab.com',
                'rating' => 5,
                'photo_profil' => 'uploads/rating_photos/najwa.png',
                'comment' => 'Saya suka pendekatan lokal dan semangat pemberdayaannya. Salut untuk tim UMKM Wong Kudus!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
