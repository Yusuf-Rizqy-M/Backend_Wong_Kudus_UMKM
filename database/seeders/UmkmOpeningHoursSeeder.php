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
            // BAE
            ['slug' => 'warung-makan-om-w', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'ayam-geprek-jawi', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
            ]],
            ['slug' => 'soto-lamongan-mbak-yuli', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
            ]],
            ['slug' => 'es-cincau-pasundan', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
            ]],
            ['slug' => 'jasa-tulis-kudus', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],

            // DAWE
            ['slug' => 'swike-dawe-restaurant', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
            ]],
            ['slug' => 'wekate-gank', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
            ]],
            ['slug' => 'rumah-makan-mak-kiyem', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'jasa-angkut-dan-pasir-bata-merah-jumbo', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'ayam-geprek-sai', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
            ]],

            // GEBOG
            ['slug' => 'warung-makan-mbah-sapar', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],

            // === ID 12–45: DATA BARU ===
            ['slug' => 'nasi-uduk-dan-nasi-kuning-gang-satu', 'openingHours' => [
                ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                ['day' => 'Selasa', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '05.30 - 11.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
            ]],
            ['slug' => 'sari-rasa-bakso-malvinas', 'openingHours' => [
                ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                ['day' => 'Selasa', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '05.30 - 11.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '06.00 - 12.00', 'isOpen' => true],
            ]],
            ['slug' => 'warung-makan-mak-ru', 'openingHours' => [
                ['day' => 'Senin', 'hours' => 'Tutup', 'isOpen' => false],
                ['day' => 'Selasa', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
            ]],
            ['slug' => 'kasehito-works', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.00 - 18.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '13.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => 'Tutup', 'isOpen' => false],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'cakrawala-sego-sambel', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '09.30 - 00.30', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '09.30 - 00.30', 'isOpen' => true],
            ]],
            ['slug' => 'nasi-opor-sunggingan', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '06.00 - 14.00', 'isOpen' => true],
            ]],
            ['slug' => 'warung-enthog-pak-badi', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '09.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'jasa-powder-coating-dan-platting-kudus', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'kedai-es-bang-maman', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
            ]],
            ['slug' => 'jus-pojokan', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '09.00 - 17.00', 'isOpen' => true],
            ]],
            ['slug' => 'kedai-twins-seblak-bandung-juice-jekulo', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '09.15 - 20.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '09.15 - 20.00', 'isOpen' => true],
            ]],
            ['slug' => 'lentog-tanjung-bang-saiful', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '05.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '05.00 - 22.00', 'isOpen' => true],
            ]],
            ['slug' => 'berkah-es-buah', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
            ]],
            ['slug' => 'warnet-jaya-sentosa', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '07.00 - 22.00', 'isOpen' => true],
            ]],
            ['slug' => 'jahe-rempah-leggit', 'openingHours' => [
                ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
            ]],
            ['slug' => 'warung-makan-bu-carik', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 17.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '07.00 - 17.00', 'isOpen' => true],
            ]],
            ['slug' => 'tehatea-indonesia', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
            ]],
            ['slug' => 'warung-makan-2-putra', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 20.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
            ]],
            ['slug' => 'jasa-angkut-barang', 'openingHours' => [
                ['day' => 'Senin', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Buka 24 Jam', 'isOpen' => true],
            ]],
            ['slug' => 'susu-moeria', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '06.00 - 22.00', 'isOpen' => true],
            ]],
            ['slug' => 'ramboo-chicken', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '09.00 - 21.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '09.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'es-gempol-pak-masykur', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '08.00 - 16.00', 'isOpen' => true],
            ]],
            ['slug' => 'sultan-barber-top', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
            ]],

            // ID 35–45 (KOTA KUDUS, MEJOBO, UNDAAN)
            ['slug' => 'soto-kudus-bu-jatmi', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'xgam-tech', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'jasa-las-dan-bubut-mulyo-rejo', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'putra-kalimosodo', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 16.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 16.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 16.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 16.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 16.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'ikan-bakar-nasuky-mubarok-jepang', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 22.00', 'isOpen' => true],
            ]],
            ['slug' => 'rm-bu-sarah', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '07.00 - 15.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'queen-seblak-prasmanan', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 20.00', 'isOpen' => true],
            ]],
            ['slug' => 'ayam-geprek-mak-ginting', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => '10.00 - 21.00', 'isOpen' => true],
            ]],
            ['slug' => 'warung-sate-dan-gule-pak-sugiyo', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 15.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 15.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 15.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 15.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 15.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 15.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'mj-teknik', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
            ['slug' => 'fotocopy-dan-jasa-travel', 'openingHours' => [
                ['day' => 'Senin', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Selasa', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Rabu', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Kamis', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Jumat', 'hours' => '08.00 - 17.00', 'isOpen' => true],
                ['day' => 'Sabtu', 'hours' => '08.00 - 14.00', 'isOpen' => true],
                ['day' => 'Minggu', 'hours' => 'Tutup', 'isOpen' => false],
            ]],
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