<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\UmkmLocation;
use Illuminate\Database\Seeder;

class UmkmLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $umkms = Umkm::pluck('id', 'slug')->all();

        $dataDetailUMKM = [
            // BAE
            [
                'id' => 1,
                'slug' => 'warung-makan-om-w',
                'location' => [
                    'address' => 'Jl. Kapten Ali Mahmudi, Kudus',
                    'fullAddress' => 'Jl. Kapten Ali Mahmudi RT 3 RW 3, Desa Bacin, Kec. Bae, Kabupaten Kudus, Jawa Tengah 59311',
                    'mapsUrl' => 'https://maps.app.goo.gl/p2y9yqgkziBTC84BA',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7843175,110.84337095&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 2,
                'slug' => 'ayam-geprek-jawi',
                'location' => [
                    'address' => 'Jl. Lingkar Utara, Kudus',
                    'fullAddress' => 'Jl. Lkr. Utara, Kayuapu Kulon, Gondangmanis, Kec. Bae, Kabupaten Kudus, Jawa Tengah 59327',
                    'mapsUrl' => 'https://maps.app.goo.gl/Gdz1A9GPonLXUVsy8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7834093,110.8657576&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 3,
                'slug' => 'soto-lamongan-mbak-yuli',
                'location' => [
                    'address' => 'Jl. Lingkar Utara, Kudus',
                    'fullAddress' => 'Jl. Lkr. Utara, Kayuapu Kulon, Gondangmanis, Kec. Bae, Kabupaten Kudus, Jawa Tengah 59327',
                    'mapsUrl' => 'https://maps.app.goo.gl/indZFwYSP1aQHWaTA',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.783404,110.8631827&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 4,
                'slug' => 'es-cincau-pasundan',
                'location' => [
                    'address' => 'Jl. Bendokerep, Kudus',
                    'fullAddress' => '6V7M+F8C, Bendokerep, Karangbener, Kec. Bae, Kabupaten Kudus, Jawa Tengah 59323',
                    'mapsUrl' => 'https://maps.app.goo.gl/3Q2n52R4HtU9dXy38',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7863083,110.8832585&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 5,
                'slug' => 'jasa-tulis-kudus',
                'location' => [
                    'address' => 'Panjang, Kudus',
                    'fullAddress' => 'Unnamed Road, Panjang, Kec. Bae, Kabupaten Kudus, Jawa Tengah 59326',
                    'mapsUrl' => 'https://maps.app.goo.gl/yuRDNSCH69zDq3He9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7826663,110.8483528&hl=id&z=15&output=embed',
                ],
            ],

            // DAWE
            [
                'id' => 6,
                'slug' => 'swike-dawe-restaurant',
                'location' => [
                    'address' => 'Dawe, Kudus',
                    'fullAddress' => '7V79+V32, Dawe, Piji, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353',
                    'mapsUrl' => 'https://maps.app.goo.gl/Uw7pQGGRbTZ23Ai38',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7353662,110.8676438&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 7,
                'slug' => 'wekate-gank',
                'location' => [
                    'address' => 'Kudus, Jawa Tengah, Indonesia',
                    'fullAddress' => '6VR9+MC5, Gg. 4, Bonduren, Gondangmanis, Kec. Bae, Kabupaten Kudus, Jawa Tengah 59327',
                    'mapsUrl' => 'https://maps.app.goo.gl/adjgTfQ4HJkW6GET8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.758369,110.8685629&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 8,
                'slug' => 'rumah-makan-mak-kiyem',
                'location' => [
                    'address' => 'Cendono Wetan, Kudus',
                    'fullAddress' => '6VW8+Q3X, Cendono Wetan, Cendono, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59327',
                    'mapsUrl' => 'https://maps.app.goo.gl/DjZGXsB4cgqrZQB96',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7530186,110.865249&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 9,
                'slug' => 'jasa-angkut-dan-pasir-bata-merah-jumbo',
                'location' => [
                    'address' => 'Kutatan, Lau, Kudus',
                    'fullAddress' => '7V9G+C2R KUTUTAN, RT.05/RW.7, Kutatan, Lau, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353',
                    'mapsUrl' => 'https://maps.app.goo.gl/ue9UszJj8V6UH9C4A',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7313946,110.8750102&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 10,
                'slug' => 'ayam-geprek-sai',
                'location' => [
                    'address' => 'Cendono Wetan, Cendono, Kudus',
                    'fullAddress' => 'Jl. Raya Kudus - Colo, Cendono Wetan, Cendono, Kec. Dawe, Kabupaten Kudus, Jawa Tengah 59353',
                    'mapsUrl' => 'https://maps.app.goo.gl/xpHHdoKUgjFedBaAA',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7439998,110.8634183&hl=id&z=15&output=embed',
                ],
            ],

            // GEBOG
            [
                'id' => 11,
                'slug' => 'warung-makan-mbah-sapar',
                'location' => [
                    'address' => 'Beru, Kudus',
                    'fullAddress' => 'Beru, Gondosari, Gebog, Kabupaten Kudus, Jawa Tengah 59333',
                    'mapsUrl' => 'https://maps.app.goo.gl/8vQpd1VTCgSWGQFRA',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7305572,110.8450368&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 12,
                'slug' => 'nasi-uduk-dan-nasi-kuning-gang-satu',
                'location' => [
                    'address' => 'Jl. Raya Jurang Gang 1, Kudus',
                    'fullAddress' => 'Jl Raya Jurang Gang 1, RT.01/RW.1, Krasak, Jurang, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333',
                    'mapsUrl' => 'https://maps.app.goo.gl/GZtkthTbKMB8uVmX8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7489773,110.8442676&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 13,
                'slug' => 'sari-rasa-bakso-malvinas',
                'location' => [
                    'address' => 'Besito Kulon, Besito, Kudus',
                    'fullAddress' => '6RWR+JX4, Gg. 10, Besito Kulon, Besito, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333',
                    'mapsUrl' => 'https://maps.app.goo.gl/QwkKRJxymL6xbqU38',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7534796,110.8424666&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 14,
                'slug' => 'warung-makan-mak-ru',
                'location' => [
                    'address' => 'Besito Kulon, Besito, Kudus',
                    'fullAddress' => 'Jl. Raya PR Sukun No.3, RT.04/RW.05, Besito Kulon, Besito, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333',
                    'mapsUrl' => 'https://maps.app.goo.gl/uCznwk5qkJk1pxnZ8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7548677,110.8432437&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 15,
                'slug' => 'kasehito-works',
                'location' => [
                    'address' => 'Besito Kulon, Besito, Kudus',
                    'fullAddress' => '6RWV+X93, Besito Kulon, Besito, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333',
                    'mapsUrl' => 'https://maps.app.goo.gl/7KiT1EDEoMcAuoG8A',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7525493,110.8434053&hl=id&z=15&output=embed',
                ],
            ],

            // JATI
            [
                'id' => 16,
                'slug' => 'cakrawala-sego-sambel',
                'location' => [
                    'address' => 'Jl. Jend. Ahmad Yani No.1, Kudus',
                    'fullAddress' => 'Jl. Jend. Ahmad Yani No.1, Getas, Getas Pejaten, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59343',
                    'mapsUrl' => 'https://maps.app.goo.gl/KAEdTUUM8rNoydMx5',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8197711,110.8367989&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 17,
                'slug' => 'nasi-opor-sunggingan',
                'location' => [
                    'address' => 'Plosokrajan, Ploso, Kudus',
                    'fullAddress' => 'Jl. Niti Semito No.9, Plosokrajan, Ploso, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59348',
                    'mapsUrl' => 'https://maps.app.goo.gl/5c1AXkGtvFzzf37e9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8141086,110.830343&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 18,
                'slug' => 'warung-enthog-pak-badi',
                'location' => [
                    'address' => 'Murai, Pasuruhan Lor, Kudus',
                    'fullAddress' => '5RMF+7CR, Jl. Ganesa Gg. Murai, Pasuruhan Lor, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59349',
                    'mapsUrl' => 'https://maps.app.goo.gl/F1kR2vsyPVpCNh9j9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8167599,110.8235253&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 19,
                'slug' => 'jasa-powder-coating-dan-platting-kudus',
                'location' => [
                    'address' => 'Plosokrajan, Ploso, Kudus',
                    'fullAddress' => 'Jl. Kulon Asem No.RT.003, RT.04/RW.002, Plosokrajan, Ploso, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59348',
                    'mapsUrl' => 'https://maps.app.goo.gl/t4doYbNsLBKf1mWA8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.81532,110.8273077&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 20,
                'slug' => 'kedai-es-bang-maman',
                'location' => [
                    'address' => 'Plosokrajan, Ploso, Kudus',
                    'fullAddress' => 'Jl. Mayor Basuno No.24, Plosokrajan, Ploso, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59348',
                    'mapsUrl' => 'https://maps.app.goo.gl/drHHWKjDZUX93v8x9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8143004,110.8310655&hl=id&z=15&output=embed',
                ],
            ],

            // JEKULO
            [
                'id' => 21,
                'slug' => 'jus-pojokan',
                'location' => [
                    'address' => 'Tambak, Jekulo, Kudus',
                    'fullAddress' => 'Jl. Sewonegoro No.15, Tambak, Jekulo, Kec. Jekulo, Kabupaten Kudus, Jawa Tengah 59382',
                    'mapsUrl' => 'https://maps.app.goo.gl/s3tULecskCybBNYx7',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8042478,110.9188871&hl=id&z=17&output=embed',
                ],
            ],
            [
                'id' => 22,
                'slug' => 'kedai-twins-seblak-bandung-juice-jekulo',
                'location' => [
                    'address' => 'Karang, Jekulo, Kudus',
                    'fullAddress' => 'Karang, Jekulo, Kec. Jekulo, Kabupaten Kudus, Jawa Tengah 59382',
                    'mapsUrl' => 'https://maps.app.goo.gl/1Qha1LYnCBrb68Bv7',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8099173,110.9227112&hl=id&z=17&output=embed',
                ],
            ],
            [
                'id' => 23,
                'slug' => 'lentog-tanjung-bang-saiful',
                'location' => [
                    'address' => 'Karang, Jekulo, Kudus',
                    'fullAddress' => 'Jl. Raya Siliwangi No.275, Karang, Jekulo, Kec. Jekulo, Kabupaten Kudus, Jawa Tengah 59382',
                    'mapsUrl' => 'https://maps.app.goo.gl/E9vd1bSfHm9fJEKZA',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8132827,110.9230951&hl=id&z=17&output=embed',
                ],
            ],
            [
                'id' => 24,
                'slug' => 'berkah-es-buah',
                'location' => [
                    'address' => 'Kalidoro Lor, Bulungcangkring, Kudus',
                    'fullAddress' => '5WV9+4H7, Jl. Ps. Puri, Kalidoro Lor, Bulungcangkring, Kec. Jekulo, Kabupaten Kudus, Jawa Tengah 59382',
                    'mapsUrl' => 'https://maps.app.goo.gl/TmtJsgZEGhUvJ68s6',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8072038,110.918911&hl=id&z=15&output=embed',
                ],
            ],

                // ID 25 - 34: Kosong (tambahkan nanti jika ada)
// KALIWUNGU & KOTA KUDUS (ID 25 - 34)
            [
                'id' => 25,
                'slug' => 'warnet-jaya-sentosa',
                'location' => [
                    'address' => 'Karang, Jekulo,, Kudus',
                    'fullAddress' => '5WRC+7XP, Desa Jekulo Dukuh Jekulo, Karang, Jekulo, Kec. Jekulo, Kabupaten Kudus, Jawa Tengah 59382',
                    'mapsUrl' => 'https://maps.app.goo.gl/s2JV7E3gaEUHFxsy5',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8092817,110.92246&hl=id&z=17&output=embed',
                ],
            ],
            [
                'id' => 26,
                'slug' => 'jahe-rempah-leggit',
                'location' => [
                    'address' => 'Madaran, Mijen, Kudus',
                    'fullAddress' => 'Jl. Pemuda, Madaran, Mijen, kaliwungu kudus, Kabupaten Kudus, Jawa Tengah 59361',
                    'mapsUrl' => 'https://maps.app.goo.gl/ChsXrMhvDRimhTT57',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7931315,110.7985926&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 27,
                'slug' => 'warung-makan-bu-carik',
                'location' => [
                    'address' => 'Area Sawah, Sidorekso, Kudus',
                    'fullAddress' => '6QCQ+4QM, Area Sawah, Sidorekso, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59332',
                    'mapsUrl' => 'https://maps.app.goo.gl/7TKJfvASN63JsKhn9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7796631,110.7894353&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 28,
                'slug' => 'tehatea-indonesia',
                'location' => [
                    'address' => 'Kedungdowo, Kabupaten Kudus',
                    'fullAddress' => 'Jl. Jetak Kedungdowo, Kedungdowo, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59322',
                    'mapsUrl' => 'https://maps.app.goo.gl/WYGXnmXPhEr47n1W9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7942619,110.7888683&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 29,
                'slug' => 'warung-makan-2-putra',
                'location' => [
                    'address' => 'Kedungdowo, Kudus',
                    'fullAddress' => 'Jalan Raya Kudus-Jepara KM.5, Desa No.RT 04/06, Kedungdowo, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59332',
                    'mapsUrl' => 'https://maps.app.goo.gl/m8LT9romynGkHVSu6',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.7966961,110.8019642&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 30,
                'slug' => 'jasa-angkut-barang',
                'location' => [
                    'address' => 'Setro, Setrokalangan, Kudus',
                    'fullAddress' => 'Jl. Serang Lusi, Setro, Setrokalangan, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah 59332',
                    'mapsUrl' => 'https://maps.app.goo.gl/CazxwmS7Ez2C5G4z8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8066691,110.7843391&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 31,
                'slug' => 'susu-moeria',
                'location' => [
                    'address' => 'Jl. Pemuda No.64, Magersari, Panjunan, Kudus',
                    'fullAddress' => 'Jl. Pemuda No.64, Magersari, Panjunan, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59312',
                    'mapsUrl' => 'https://maps.app.goo.gl/seh4uPGo99XUB6mx7',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8095844,110.8442737&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 32,
                'slug' => 'ramboo-chicken',
                'location' => [
                    'address' => 'Jl. KH Moh. Arwani, Kudus',
                    'fullAddress' => 'Jl. KH Moh. Arwani, Pejaten, Krandon, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59314',
                    'mapsUrl' => 'https://maps.app.goo.gl/xVjQFurMT4EqQVaw6',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.792574,110.8408274&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 33,
                'slug' => 'es-gempol-pak-masykur',
                'location' => [
                    'address' => 'Magersari, Panjunan, Kudus',
                    'fullAddress' => '5RQQ+G56, Jl. Kyai H. Wahid Hasyim, Magersari, Panjunan, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59317',
                    'mapsUrl' => 'https://maps.app.goo.gl/DDqdZESaGe87D5ev7',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8112212,110.8378874&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 34,
                'slug' => 'sultan-barber-top',
                'location' => [
                    'address' => 'Jl. Pemuda No.56, Kudus',
                    'fullAddress' => 'Jl. Pemuda No.56, Magersari, Panjunan, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59317',
                    'mapsUrl' => 'https://maps.app.goo.gl/tisWKdCUm5aWueGB9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8092534,110.8438943&hl=id&z=16&output=embed',
                ],
            ],
            // KOTA KUDUS
            [
                'id' => 35,
                'slug' => 'soto-kudus-bu-jatmi',
                'location' => [
                    'address' => 'Jl. Kyai H. Wahid Hasyim No.43, Kudus',
                    'fullAddress' => 'Jl. Kyai H. Wahid Hasyim No.43, Magersari, Panjunan, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59317',
                    'mapsUrl' => 'https://maps.app.goo.gl/BDb4ivbpLwgvVNS18',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8111989,110.83808&hl=id&z=15&output=embed',
                ],
            ],

            // MEJOBO
            [
                'id' => 36,
                'slug' => 'xgam-tech',
                'location' => [
                    'address' => 'Pendem Kulon, Jepang, Kudus',
                    'fullAddress' => '5V9C+QFC, Pendem Kulon, Jepang, Kec. Mejobo, Kabupaten Kudus, Jawa Tengah',
                    'mapsUrl' => 'https://maps.app.goo.gl/47uCsbQB5qGVC1BJ6',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8305573,110.8711491&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 37,
                'slug' => 'jasa-las-dan-bubut-mulyo-rejo',
                'location' => [
                    'address' => 'Jln.Raya 7km Rau, Kalangan, Tenggeles, Kudus',
                    'fullAddress' => 'Jln.Raya 7km Rau, Kalangan, Tenggeles, Kec. Mejobo, Kabupaten Kudus, Jawa Tengah 59381',
                    'mapsUrl' => 'https://maps.app.goo.gl/uju4fb2GhkvGQ3Wy8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8063972,110.8913509&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 38,
                'slug' => 'putra-kalimosodo',
                'location' => [
                    'address' => 'Gg. Bhakti No.1, Gulang Kulon, Kudus',
                    'fullAddress' => 'Gg. Bhakti No.1, Gulang Kulon, Gulang, Kec. Mejobo, Kabupaten Kudus, Jawa Tengah 59381',
                    'mapsUrl' => 'https://maps.app.goo.gl/o4u4BmfXfeTPDT5P6',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8405634,110.8598776&hl=id&z=17&output=embed',
                ],
            ],
            [
                'id' => 39,
                'slug' => 'ikan-bakar-nasuky-mubarok-jepang',
                'location' => [
                    'address' => 'Jepang, Kudus',
                    'fullAddress' => '5VGC+95R, Jepang, Kec. Mejobo, Kabupaten Kudus, Jawa Tengah 59381',
                    'mapsUrl' => 'https://maps.app.goo.gl/9VqKA9v83eoFPnGF9',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8240079,110.8703812&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 40,
                'slug' => 'rm-bu-sarah',
                'location' => [
                    'address' => 'Jl. Lingkar Timur, Jepang, Kudus',
                    'fullAddress' => '5VGG+772, Jl. Lingkar Timur, Jepang, Kec. Mejobo, Kabupaten Kudus, Jawa Tengah 59381',
                    'mapsUrl' => 'https://maps.app.goo.gl/ebhzkyxwckhUqQUm7',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.8243528,110.8756417&hl=id&z=15&output=embed',
                ],
            ],

            // UNDAAN
            [
                'id' => 41,
                'slug' => 'queen-seblak-prasmanan',
                'location' => [
                    'address' => 'Kampek Lor, Kalirejo, Kudus',
                    'fullAddress' => '3QCR+R9R, Kampek Lor, Kalirejo, Kec. Undaan, Kabupaten Kudus, Jawa Tengah 59372',
                    'mapsUrl' => 'https://maps.app.goo.gl/MLtSm3m9YzNcH6xdA',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.9278993,110.7909045&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 42,
                'slug' => 'ayam-geprek-mak-ginting',
                'location' => [
                    'address' => 'Gg. Manggis, Kampek Lor, Kalirejo, Kudus',
                    'fullAddress' => '3QCR+H6H, Gg. Manggis, Kampek Lor, Kalirejo, Kec. Undaan, Kabupaten Kudus, Jawa Tengah 59372',
                    'mapsUrl' => 'https://maps.app.goo.gl/qFtBBS2GG2uW28Bt5',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.9285735,110.7906047&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 43,
                'slug' => 'warung-sate-dan-gule-pak-sugiyo',
                'location' => [
                    'address' => 'Jl. Babalan - Prawoto, Kampek Lor, Kudus',
                    'fullAddress' => '3QCR+95C, Jl. Babalan - Prawoto, Kampek Lor, Kalirejo, Kec. Undaan, Kabupaten Kudus, Jawa Tengah 59372',
                    'mapsUrl' => 'https://maps.app.goo.gl/WkJAj3Ka8ZGoC7Wu5',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.9290637,110.790406&hl=id&z=15&output=embed',
                ],
            ],
            [
                'id' => 44,
                'slug' => 'mj-teknik',
                'location' => [
                    'address' => 'Kampek Lor, Kalirejo, Kudus',
                    'fullAddress' => '3QFP+5R4, Kampek Lor, Kalirejo, Kec. Undaan, Kabupaten Kudus, Jawa Tengah 59372',
                    'mapsUrl' => 'https://maps.app.goo.gl/58ZPsi3C7xu8rRTv8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.924919,110.7998945&hl=id&z=17&output=embed',
                ],
            ],
            [
                'id' => 45,
                'slug' => 'fotocopy-dan-jasa-travel',
                'location' => [
                    'address' => 'Lambangan Rt.2 Rw.1 Gg 02, Lambangan, Kudus',
                    'fullAddress' => 'Lambangan Rt.2 Rw.1 Gg 02 undaan kudus, Lambangan, Kec. Undaan, Kabupaten Kudus, Jawa Tengah 59372',
                    'mapsUrl' => 'https://maps.app.goo.gl/58ZPsi3C7xu8rRTv8',
                    'embedUrl' => 'https://www.google.com/maps?q=-6.924919,110.7998945&hl=id&z=17&output=embed',
                ],
            ],
        ];

        foreach ($dataDetailUMKM as $data) {
            if (!isset($umkms[$data['slug']])) {
                $this->command->warn('UMKM tidak ditemukan: ' . $data['slug'] . '. Dilewati.');
                continue;
            }

            $umkmId = $umkms[$data['slug']];
            $locationData = $data['location'];

            UmkmLocation::updateOrCreate(
                ['umkm_id' => $umkmId],
                [
                    'address' => $locationData['address'],
                    'full_address' => $locationData['fullAddress'],
                    'maps_url' => $locationData['mapsUrl'],
                    'embed_url' => $locationData['embedUrl'],
                    'status' => 'active',
                ]
            );
        }
    }
}