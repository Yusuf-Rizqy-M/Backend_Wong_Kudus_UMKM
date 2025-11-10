<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        $baseUrl = 'http://127.0.0.1:8000/storage/uploads/kecamatan/';

        $kecamatans = [
            ['name' => 'Bae', 'slug' => 'bae', 'image' => $baseUrl . 'kecamatan_bae.webp'],
            ['name' => 'Kaliwungu', 'slug' => 'kaliwungu', 'image' => $baseUrl . 'kecamatan_kaliwungu.webp'],
            ['name' => 'Kota Kudus', 'slug' => 'kota-kudus', 'image' => $baseUrl . 'kecamatan_kotakudus.webp'],
            ['name' => 'Gebog', 'slug' => 'gebog', 'image' => $baseUrl . 'kecamatan_gebog.webp'],
            ['name' => 'Dawe', 'slug' => 'dawe', 'image' => $baseUrl . 'kecamatan_dawe.webp'],
            ['name' => 'Jati', 'slug' => 'jati', 'image' => $baseUrl . 'kecamatan_jati.webp'],
            ['name' => 'Jekulo', 'slug' => 'jekulo', 'image' => $baseUrl . 'kecamatan_jekulo.webp'],
            ['name' => 'Mejobo', 'slug' => 'mejobo', 'image' => $baseUrl . 'kecamatan_mejobo.webp'],
            ['name' => 'Undaan', 'slug' => 'undaan', 'image' => $baseUrl . 'kecamatan_undaan.webp'],
        ];

        foreach ($kecamatans as $data) {
            Kecamatan::updateOrCreate(
                ['name' => $data['name']],
                [
                    'slug' => $data['slug'],
                    'image' => $data['image'],
                ]
            );
        }
    }
}
