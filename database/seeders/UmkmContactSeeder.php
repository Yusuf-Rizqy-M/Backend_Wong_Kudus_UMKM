<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\UmkmContact;
use Illuminate\Database\Seeder;

class UmkmContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil ID UMKM berdasarkan slug
        $umkms = Umkm::pluck('id', 'slug')->all();

        // 2. Data kontak UMKM (ID 1–45)
        $dataDetailUMKM = [
            // BAE
            ['id' => 1, 'slug' => 'warung-makan-om-w', 'contact' => ['whatsapp' => '6285850934454', 'email' => '-', 'instagram' => 'warungmakan.om.w']],
            ['id' => 2, 'slug' => 'ayam-geprek-jawi', 'contact' => ['whatsapp' => '6281225771772', 'email' => '-', 'instagram' => 'ayamgeprekjawi']],
            ['id' => 3, 'slug' => 'soto-lamongan-mbak-yuli', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 4, 'slug' => 'es-cincau-pasundan', 'contact' => ['whatsapp' => '6285866640818', 'email' => '-', 'instagram' => '-']],
            ['id' => 5, 'slug' => 'jasa-tulis-kudus', 'contact' => ['whatsapp' => '6285163123943', 'email' => '-', 'instagram' => 'jasatuliskudus']],

            // DAWE
            ['id' => 6, 'slug' => 'swike-dawe-restaurant', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 7, 'slug' => 'wekate-gank', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 8, 'slug' => 'rumah-makan-mak-kiyem', 'contact' => ['whatsapp' => '6285640083741', 'email' => '-', 'instagram' => '-']],
            ['id' => 9, 'slug' => 'jasa-angkut-dan-pasir-bata-merah-jumbo', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 10, 'slug' => 'ayam-geprek-sai', 'contact' => ['whatsapp' => '081326425112', 'email' => '-', 'instagram' => '-']],

            // GEBOG
            ['id' => 11, 'slug' => 'warung-makan-mbah-sapar', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],

            // === ID 12–34: DATA BARU ===
            ['id' => 12, 'slug' => 'nasi-uduk-dan-nasi-kuning-gang-satu', 'contact' => ['whatsapp' => '6285866665024', 'email' => '-', 'instagram' => 'nasi_uduk_gang_satu']],
            ['id' => 13, 'slug' => 'sari-rasa-bakso-malvinas', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 14, 'slug' => 'warung-makan-mak-ru', 'contact' => ['whatsapp' => '082135312131', 'email' => '-', 'instagram' => '-']],
            ['id' => 15, 'slug' => 'kasehito-works', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 16, 'slug' => 'cakrawala-sego-sambel', 'contact' => ['whatsapp' => '628562765946', 'email' => '-', 'instagram' => '-']],
            ['id' => 17, 'slug' => 'nasi-opor-sunggingan', 'contact' => ['whatsapp' => '085641756023', 'email' => '-', 'instagram' => '-']],
            ['id' => 18, 'slug' => 'warung-enthog-pak-badi', 'contact' => ['whatsapp' => '08562707781', 'email' => '-', 'instagram' => '-']],
            ['id' => 19, 'slug' => 'jasa-powder-coating-dan-platting-kudus', 'contact' => ['whatsapp' => '082133222004', 'email' => '-', 'instagram' => '-']],
            ['id' => 20, 'slug' => 'kedai-es-bang-maman', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 21, 'slug' => 'jus-pojokan', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 22, 'slug' => 'kedai-twins-seblak-bandung-juice-jekulo', 'contact' => ['whatsapp' => '085600878980', 'email' => '-', 'instagram' => '-']],
            ['id' => 23, 'slug' => 'lentog-tanjung-bang-saiful', 'contact' => ['whatsapp' => '085747474714', 'email' => '-', 'instagram' => '-']],
            ['id' => 24, 'slug' => 'berkah-es-buah', 'contact' => ['whatsapp' => '085888445959', 'email' => '-', 'instagram' => '-']],
            ['id' => 25, 'slug' => 'warnet-jaya-sentosa', 'contact' => ['whatsapp' => '085640256542', 'email' => '-', 'instagram' => '-']],
            ['id' => 26, 'slug' => 'jahe-rempah-leggit', 'contact' => ['whatsapp' => '081939666657', 'email' => '-', 'instagram' => '-']],
            ['id' => 27, 'slug' => 'warung-makan-bu-carik', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 28, 'slug' => 'tehatea-indonesia', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 29, 'slug' => 'warung-makan-2-putra', 'contact' => ['whatsapp' => '0895383599877', 'email' => '-', 'instagram' => '-']],
            ['id' => 30, 'slug' => 'jasa-angkut-barang', 'contact' => ['whatsapp' => '085691006788', 'email' => '-', 'instagram' => '-']],
            ['id' => 31, 'slug' => 'susu-moeria', 'contact' => ['whatsapp' => '087825368484', 'email' => '-', 'instagram' => 'susumoeriacafe']],
            ['id' => 32, 'slug' => 'ramboo-chicken', 'contact' => ['whatsapp' => '6289673183625', 'email' => 'ramboo@gmail.com', 'instagram' => 'ramboochicken']],
            ['id' => 33, 'slug' => 'es-gempol-pak-masykur', 'contact' => ['whatsapp' => '085640087033', 'email' => '-', 'instagram' => '-']],
            ['id' => 34, 'slug' => 'sultan-barber-top', 'contact' => ['whatsapp' => '085184711418', 'email' => '-', 'instagram' => 'sultan_barbertop.id']],

            // KOTA KUDUS (sebelumnya)
            ['id' => 35, 'slug' => 'soto-kudus-bu-jatmi', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => 'sotokudusbujatmi']],

            // MEJOBO
            ['id' => 36, 'slug' => 'xgam-tech', 'contact' => ['whatsapp' => '081229484129', 'email' => '-', 'instagram' => '-']],
            ['id' => 37, 'slug' => 'jasa-las-dan-bubut-mulyo-rejo', 'contact' => ['whatsapp' => '085740789456', 'email' => '-', 'instagram' => '-']],
            ['id' => 38, 'slug' => 'putra-kalimosodo', 'contact' => ['whatsapp' => '085899447002', 'email' => '-', 'instagram' => '-']],
            ['id' => 39, 'slug' => 'ikan-bakar-nasuky-mubarok-jepang', 'contact' => ['whatsapp' => '081232281179', 'email' => '-', 'instagram' => '-']],
            ['id' => 40, 'slug' => 'rm-bu-sarah', 'contact' => ['whatsapp' => '089647857231', 'email' => '-', 'instagram' => '-']],

            // UNDAAN
            ['id' => 41, 'slug' => 'queen-seblak-prasmanan', 'contact' => ['whatsapp' => '085278090870', 'email' => '-', 'instagram' => '-']],
            ['id' => 42, 'slug' => 'ayam-geprek-mak-ginting', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 43, 'slug' => 'warung-sate-dan-gule-pak-sugiyo', 'contact' => ['whatsapp' => '081215470578', 'email' => '-', 'instagram' => '-']],
            ['id' => 44, 'slug' => 'mj-teknik', 'contact' => ['whatsapp' => '081215504068', 'email' => '-', 'instagram' => '-']],
            ['id' => 45, 'slug' => 'fotocopy-dan-jasa-travel', 'contact' => ['whatsapp' => '085866575305', 'email' => '-', 'instagram' => '-']],
        ];

        // 3. Looping dan masukkan data
        foreach ($dataDetailUMKM as $data) {
            if (!isset($umkms[$data['slug']])) {
                $this->command->warn('UMKM tidak ditemukan: ' . $data['slug'] . '. Dilewati.');
                continue;
            }

            $umkmId = $umkms[$data['slug']];
            $contactData = $data['contact'];

            UmkmContact::updateOrCreate(
                ['umkm_id' => $umkmId],
                [
                    'whatsapp' => $contactData['whatsapp'] === '-' ? null : $contactData['whatsapp'],
                    'email' => $contactData['email'] === '-' ? null : $contactData['email'],
                    'instagram' => $contactData['instagram'] === '-' ? null : $contactData['instagram'],
                    'status' => 'active',
                ]
            );
        }
    }
}