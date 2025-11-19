<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\UmkmOpeningHour; // Sesuaikan nama model
use Illuminate\Database\Seeder;

class UmkmOpeningHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil ID UMKM berdasarkan slug
        $umkms = Umkm::pluck('id', 'slug')->all();

        // 2. Data opening hours (dari JSON)
        $openingHoursData = [
            // 1. Warung Makan Om W
            [
                'slug' => 'warung-makan-om-w',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],

            // 2. Ayam Geprek Jawi
            [
                'slug' => 'ayam-geprek-jawi',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 3. Soto Lamongan Mbak Yuli
            [
                'slug' => 'soto-lamongan-mbak-yuli',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.30 - 10.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.30 - 13.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.30 - 13.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.30 - 12.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.30 - 10.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.30 - 10.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.30 - 10.00', 'isOpen' => true],
                ]
            ],

            // 4. Es Cincau Pasundan
            [
                'slug' => 'es-cincau-pasundan',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ]
            ],

            // 5. Jasa Tulis Kudus
            [
                'slug' => 'jasa-tulis-kudus',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ]
            ],

            // 6. Resto MVR Kudus
            [
                'slug' => 'resto-mvr-kudus',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 7. VJO Cafe and Bistro
            [
                'slug' => 'vjo-cafe-bistro',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 8. Toko Al Maira
            [
                'slug' => 'toko-al-maira',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '11.00 - 02.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '11.00 - 02.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '11.00 - 02.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '11.00 - 02.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '11.00 - 02.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '11.00 - 02.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '17.00 - 02.00', 'isOpen' => true],
                ]
            ],

            // 9. Siskanuna Boutique
            [
                'slug' => 'siskanuna-boutique',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '12.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '12.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '12.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '12.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '12.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '12.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],

            // 10. Terebatik
            [
                'slug' => 'terebatik',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ]
            ],

            // DAWE
            // 11. Swike Dawe Restaurant
            [
                'slug' => 'swike-dawe-restaurant',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ]
            ],

            // 12. WEKATE GANK
            [
                'slug' => 'wekate-gank',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ]
            ],

            // 13. Rumah Makan Mak Kiyem
            [
                'slug' => 'rumah-makan-mak-kiyem',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '03.00 - 01.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '03.00 - 01.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '03.00 - 01.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '03.00 - 01.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '03.00 - 01.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '03.00 - 01.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '03.00 - 01.00', 'isOpen' => true],
                ]
            ],

            // 14. Jasa Angkut & Pasir & Bata Merah Jumbo
            [
                'slug' => 'jasa-angkut-dan-pasir-bata-merah-jumbo',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ]
            ],

            // 15. Ayam Geprek Sai
            [
                'slug' => 'ayam-geprek-sai',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '9.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '9.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '9.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '9.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '9.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '9.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '9.30 - 21.00', 'isOpen' => true],
                ]
            ],

            // 16. Warung Makan Sendang Mulia
            [
                'slug' => 'warung-makan-sendang-mulia',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.30 - 15.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.30 - 15.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.30 - 15.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.30 - 15.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.30 - 15.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.30 - 15.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.30 - 15.00', 'isOpen' => true],
                ]
            ],

            // 17. Toko ADIB AZKA
            [
                'slug' => 'toko-adib-azka',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                ]
            ],

            // 18. Toko Sri Dawe
            [
                'slug' => 'toko-sri-dawe',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 19. Arfan Outfit Kudus
            [
                'slug' => 'arfan-outfit-kudus',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 20. Dinda Store DS
            [
                'slug' => 'dinda-store-ds',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // GEBOG
            // 21. Warung Makan Mbah Sapar
            [
                'slug' => 'warung-makan-mbah-sapar',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.00 – 13.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.00 – 13.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 – 13.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 – 13.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.00 – 13.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 – 13.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 – 13.30', 'isOpen' => true],
                ]
            ],

            // 22. Nasi Uduk dan Nasi Kuning Gang Satu
            [
                'slug' => 'nasi-uduk-dan-nasi-kuning-gang-satu',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Selasa', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '05.30 - 11.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ]
            ],

            // 23. Sari Rasa Bakso Malvinas
            [
                'slug' => 'sari-rasa-bakso-malvinas',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Selasa', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '05.30 - 11.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ]
            ],

            // 24. Warung Makan Mak Ru
            [
                'slug' => 'warung-makan-mak-ru',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Selasa', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 25. Kasehito Works
            [
                'slug' => 'kasehito-works',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '13.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],

            // 26. Basina Food
            [
                'slug' => 'basina-food',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '11.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '11.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '11.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '11.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '11.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '11.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '11.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 27. Campaign Coffee
            [
                'slug' => 'campaign-coffee',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Selasa', 'hours' => '09.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '13.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 23.00', 'isOpen' => true],
                ]
            ],

            // 28. Toko TNA JAYA
            [
                'slug' => 'toko-tna-jaya',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 29. Toko Teguh Sudarsono
            [
                'slug' => 'toko-teguh-sudarsono',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],
            // 30. Nilna Dion Collection
            [
                'slug' => 'nilna-dion-collection',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 20.00', 'isOpen' => true],
                ]
            ],

            // 31. Toko Kastimah
            [
                'slug' => 'toko-kastimah',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '05.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '05.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '05.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '05.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '05.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '05.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '05.00 - 20.00', 'isOpen' => true],
                ]
            ],
            // JATI
            // 32. Cakrawala Sego Sambel
            [
                'slug' => 'cakrawala-sego-sambel',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                ]
            ],

            // 33. Nasi Opor Sunggingan
            [
                'slug' => 'nasi-opor-sunggingan',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ]
            ],

            // 34. Warung Enthog Pak Badi
            [
                'slug' => 'warung-enthog-pak-badi',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],

            // 35. Jasa Powder Coating & Platting Kudus
            [
                'slug' => 'jasa-powder-coating-dan-platting-kudus',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],

            // 36. Kedai Es Bang Maman
            [
                'slug' => 'kedai-es-bang-maman',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ]
            ],

            // 37. Gravitasi Teras Muria
            [
                'slug' => 'gravitasi-teras-muria',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Selasa', 'hours' => 'Tutup', 'isOpen' => false], // Tidak ada di data asli, diasumsikan tutup
                    ['day' => 'Rabu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 38. Toko Kliwon
            [
                'slug' => 'toko-kliwon',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.30 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Tutup', 'isOpen' => false], // Tidak disebutkan, diasumsikan tutup
                    ['day' => 'Rabu', 'hours' => '08.30 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.30 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.30 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.30 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.30 - 17.00', 'isOpen' => true],
                ]
            ],

            // 39. Toko Happy Kids
            [
                'slug' => 'toko-happy-kids',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Tutup', 'isOpen' => false], // Tidak disebutkan
                    ['day' => 'Rabu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                ]
            ],

            // 40. Nobby Kudus Extension Mall
            [
                'slug' => 'nobby-kudus-extension',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Tutup', 'isOpen' => false], // Tidak disebutkan
                    ['day' => 'Rabu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // Jekulo
            // 41. Jus Pojokan
            [
                'slug' => 'jus-pojokan',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ]
            ],

            // 42. Kedai Twins Seblak Bandung n Juice Jekulo
            [
                'slug' => 'kedai-twins-seblak-bandung-juice-jekulo',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                ]
            ],

            // 43. Lentog Tanjung Bang Saiful
            [
                'slug' => 'lentog-tanjung-bang-saiful',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 44. Berkah Es Buah
            [
                'slug' => 'berkah-es-buah',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ]
            ],

            // 45. Warnet Jaya Sentosa
            [
                'slug' => 'warnet-jaya-sentosa',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 46. Warung Mie Dadat Pak Karnan
            [
                'slug' => 'warung-mie-dadat',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '03.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '03.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '03.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '03.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '03.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '03.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],

            // 47. Toko Risfan Snack
            [
                'slug' => 'toko-risfan-snack',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                ]
            ],

            // 48. Js Muslim Collection Kudus
            [
                'slug' => 'js-muslim-collection',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 49. Kios Hjh Zaroah
            [
                'slug' => 'kios-hjh',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 13.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 13.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 13.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 13.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 13.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 13.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 13.00', 'isOpen' => true],
                ]
            ],
            // KALIWUNGU
            // 50. Jahe Rempah Leggit
            [
                'slug' => 'jahe-rempah-leggit',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ]
            ],

            // 51. Warung Makan Bu Carik
            [
                'slug' => 'warung-makan-bu-carik',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ]
            ],

            // 52. Tehatea Indonesia
            [
                'slug' => 'tehatea-indonesia',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ]
            ],

            // 53. Warung Makan 2 Putra
            [
                'slug' => 'warung-makan-2-putra',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 10.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 10.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 10.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 10.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 10.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 10.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 10.00', 'isOpen' => true],
                ]
            ],

            // 54. Jasa Angkut Barang
            [
                'slug' => 'jasa-angkut-barang',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ]
            ],

            // 55. Sego Sambel Lek Kas 2
            [
                'slug' => 'sego-sambel-lek-kas2',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Selasa', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 56. Toko Jamaah
            [
                'slug' => 'toko-jamaah',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ]
            ],

            // 57. MM Amanah
            [
                'slug' => 'mm-amanah',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.00 - 22.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.00 - 22.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 22.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 22.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.00 - 22.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 22.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 22.30', 'isOpen' => true],
                ]
            ],

            // 58. Toko Van Helen Serba 35000
            [
                'slug' => 'toko-van-helen',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                ]
            ],

            // 59. Lina Family
            [
                'slug' => 'lina-family',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 20.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 20.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 20.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 20.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 20.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 20.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 20.30', 'isOpen' => true],
                ]
            ],
            // KOTA KUDUS
            // 60. Susu Moeria
            [
                'slug' => 'susu-moeria',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 61. Ramboo Chicken
            [
                'slug' => 'ramboo-chicken',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
                ]
            ],

            // 62. Es Gempol Pak Masykur
            [
                'slug' => 'es-gempol-pak-masykur',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ]
            ],

            // 63. Sultan Barber Top
            [
                'slug' => 'sultan-barber-top',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 64. Soto Kudus Bu Jatmi
            [
                'slug' => 'soto-kudus-bu-jatmi',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 65. Treend Steak Kudus
            [
                'slug' => 'treend-steak-kudus',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 66. Larees Jaya Electronics
            [
                'slug' => 'larees-jaya-electronics',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.30 - 14.00', 'isOpen' => true],
                ]
            ],

            // 67. Es Coklat Cokot Kudus
            [
                'slug' => 'es-coklat-cokot-kudus',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 68. Richie Store Kudus
            [
                'slug' => 'richie-store-kudus',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 21.30', 'isOpen' => true],
                ]
            ],
            // MEJOBO
            // 69. XGAM_Tech
            [
                'slug' => 'xgam-tech',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.00 - 23.00', 'isOpen' => true],
                ]
            ],

            // 70. Jasa Las dan Bubut Mulyo Rejo
            [
                'slug' => 'jasa-las-dan-bubut-mulyo-rejo',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ]
            ],

            // 71. Putra Kalimosodo
            [
                'slug' => 'putra-kalimosodo',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ]
            ],

            // 72. Ikan Bakar Nasuky Mubarok Jepang
            [
                'slug' => 'ikan-bakar-nasuky-mubarok-jepang',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 73. RM Bu Sarah
            [
                'slug' => 'rm-bu-sarah',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '06.00 - 19.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '06.00 - 19.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '06.00 - 19.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '06.00 - 19.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '06.00 - 19.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '06.00 - 19.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '06.00 - 19.30', 'isOpen' => true],
                ]
            ],

            // 74. Sate Kambing Pak Brewok Pekeng
            [
                'slug' => 'sate-kambing-pak-brewok',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '10.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '10.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '10.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '10.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '10.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '10.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '10.30 - 21.00', 'isOpen' => true],
                ]
            ],

            // 75. Loh Jinawi Olshop (Lapak Gelang Tasbih)
            [
                'slug' => 'loh-jinawi',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ]
            ],

            // 76. Toko Auralia Jaya
            [
                'slug' => 'toko-auralia',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.30', 'isOpen' => true],
                ]
            ],

            // 77. Sekar Modiste
            [
                'slug' => 'sekar-modiste',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 78. Hasna Fashion 01
            [
                'slug' => 'hasna-fashion',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '07.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '07.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '07.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '07.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '07.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '07.30 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '07.30 - 21.00', 'isOpen' => true],
                ]
            ],
            // UNDAAN
            // 79. Queen Seblak Prasmanan
            [
                'slug' => 'queen-seblak-prasmanan',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 80. Ayam Geprek Mak Ginting
            [
                'slug' => 'ayam-geprek-mak-ginting',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 81. Warung Sate & Gule Pak Sugiyo
            [
                'slug' => 'warung-sate-dan-gule-pak-sugiyo',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 82. MJ Teknik
            [
                'slug' => 'mj-teknik',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => 'Tutup', 'isOpen' => false],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 83. Fotocopy & Jasa Travel
            [
                'slug' => 'fotocopy-dan-jasa-travel',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],

            // 84. Ngabus Rejo
            [
                'slug' => 'ngabus-rejo',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.15', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.15', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.15', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.15', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.15', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.15', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.15', 'isOpen' => true],
                ]
            ],

            // 85. Nano Distro
            [
                'slug' => 'nano-distro',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 22.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 22.00', 'isOpen' => true],
                ]
            ],

            // 86. Ilbabalanos Store
            [
                'slug' => 'ilbabalanos',
                'openingHours' => [
                    ['day' => 'Senin', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Selasa', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Rabu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Kamis', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Jumat', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Sabtu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                    ['day' => 'Minggu', 'hours' => '08.00 - 21.00', 'isOpen' => true],
                ]
            ],
        ];

        // 3. Looping dan masukkan data
        foreach ($openingHoursData as $data) {
            if (!isset($umkms[$data['slug']])) {
                $this->command->warn('UMKM (Opening Hours) tidak ditemukan: ' . $data['slug'] . '. Dilewati.');
                continue;
            }

            $umkmId = $umkms[$data['slug']];

            foreach ($data['openingHours'] as $hour) {
                UmkmOpeningHour::updateOrCreate(
                    [
                        'umkm_id' => $umkmId,
                        'day' => $hour['day'],
                    ],
                    [
                        'hours' => $hour['hours'],
                        'is_open' => $hour['isOpen'],
                        'status' => 'active',
                    ]
                );
            }
        }
    }
}
