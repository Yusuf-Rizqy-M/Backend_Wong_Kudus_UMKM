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
            ['id' => 1, 'slug' => 'warung-makan-om-w', 'contact' => ['whatsapp' => '6285850934454', 'email' => '-', 'instagram' => 'warungmakan.om.w']],
            ['id' => 2, 'slug' => 'ayam-geprek-jawi', 'contact' => ['whatsapp' => '6281225771772', 'email' => '-', 'instagram' => 'ayamgeprekjawi']],
            ['id' => 3, 'slug' => 'soto-lamongan-mbak-yuli', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 4, 'slug' => 'es-cincau-pasundan', 'contact' => ['whatsapp' => '6285866640818', 'email' => '-', 'instagram' => '-']],
            ['id' => 5, 'slug' => 'jasa-tulis-kudus', 'contact' => ['whatsapp' => '6285163123943', 'email' => '-', 'instagram' => 'jasatuliskudus']],
            ['id' => 6, 'slug' => 'resto-mvr-kudus', 'contact' => ['whatsapp' => '085641742274', 'email' => '-', 'instagram' => '-']],
            ['id' => 7, 'slug' => 'vjo-cafe-bistro', 'contact' => ['whatsapp' => '08999090734', 'email' => '-', 'instagram' => 'vjocafeandbistro']],
            ['id' => 8, 'slug' => 'toko-al-maira', 'contact' => ['whatsapp' => '085641114311', 'email' => '-', 'instagram' => '-']],
            ['id' => 9, 'slug' => 'siskanuna-boutique', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 10, 'slug' => 'terebatik', 'contact' => ['whatsapp' => '085711556655', 'email' => '-', 'instagram' => '-']],
            ['id' => 11, 'slug' => 'swike-dawe-restaurant', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 12, 'slug' => 'wekate-gank', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 13, 'slug' => 'rumah-makan-mak-kiyem', 'contact' => ['whatsapp' => '6285640083741', 'email' => '-', 'instagram' => '-']],
            ['id' => 14, 'slug' => 'jasa-angkut-dan-pasir-bata-merah-jumbo', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 15, 'slug' => 'ayam-geprek-sai', 'contact' => ['whatsapp' => '081326425112', 'email' => '-', 'instagram' => '-']],
            ['id' => 16, 'slug' => 'warung-makan-sendang-mulia', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 17, 'slug' => 'toko-adib-azka', 'contact' => ['whatsapp' => '081390381670', 'email' => '-', 'instagram' => '-']],
            ['id' => 18, 'slug' => 'toko-sri-dawe', 'contact' => ['whatsapp' => '085641978008', 'email' => '-', 'instagram' => '-']],
            ['id' => 19, 'slug' => 'arfan-outfit-kudus', 'contact' => ['whatsapp' => '085815271237', 'email' => '-', 'instagram' => 'arfanoutfit']],
            ['id' => 20, 'slug' => 'dinda-store-ds', 'contact' => ['whatsapp' => '085878702301', 'email' => '-', 'instagram' => '-']],
            ['id' => 21, 'slug' => 'warung-makan-mbah-sapar', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 22, 'slug' => 'nasi-uduk-dan-nasi-kuning-gang-satu', 'contact' => ['whatsapp' => '6285866665024', 'email' => '-', 'instagram' => 'nasi_uduk_gang_satu']],
            ['id' => 23, 'slug' => 'sari-rasa-bakso-malvinas', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 24, 'slug' => 'warung-makan-mak-ru', 'contact' => ['whatsapp' => '082135312131', 'email' => '-', 'instagram' => '-']],
            ['id' => 25, 'slug' => 'kasehito-works', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 26, 'slug' => 'basina-food', 'contact' => ['whatsapp' => '085710221752', 'email' => '-', 'instagram' => '-']],
            ['id' => 27, 'slug' => 'campaign-coffee', 'contact' => ['whatsapp' => '082225556116', 'email' => '-', 'instagram' => 'campaigncoffee']],
            ['id' => 28, 'slug' => 'toko-tna-jaya', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 29, 'slug' => 'toko-teguh-sudarsono', 'contact' => ['whatsapp' => '085641510768', 'email' => '-', 'instagram' => '-']],
            ['id' => 30, 'slug' => 'nilna-dion-collection', 'contact' => ['whatsapp' => '085713223054', 'email' => '-', 'instagram' => '-']],
            ['id' => 31, 'slug' => 'toko-kastimah', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 32, 'slug' => 'cakrawala-sego-sambel', 'contact' => ['whatsapp' => '628562765946', 'email' => '-', 'instagram' => '-']],
            ['id' => 33, 'slug' => 'nasi-opor-sunggingan', 'contact' => ['whatsapp' => '085641756023', 'email' => '-', 'instagram' => '-']],
            ['id' => 34, 'slug' => 'warung-enthog-pak-badi', 'contact' => ['whatsapp' => '08562707781', 'email' => '-', 'instagram' => '-']],
            ['id' => 35, 'slug' => 'jasa-powder-coating-dan-platting-kudus', 'contact' => ['whatsapp' => '082133222004', 'email' => '-', 'instagram' => '-']],
            ['id' => 36, 'slug' => 'kedai-es-bang-maman', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 37, 'slug' => 'gravitasi-teras-muria', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => 'gravitasiterasmuria_id']],
            ['id' => 38, 'slug' => 'toko-kliwon', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 39, 'slug' => 'toko-happy-kids', 'contact' => ['whatsapp' => '081325081064', 'email' => '-', 'instagram' => '-']],
            ['id' => 40, 'slug' => 'nobby-kudus-extension', 'contact' => ['whatsapp' => '081944210395', 'email' => '-', 'instagram' => 'nobby_kudus']],
            ['id' => 41, 'slug' => 'jus-pojokan', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 42, 'slug' => 'kedai-twins-seblak-bandung-juice-jekulo', 'contact' => ['whatsapp' => '085600878980', 'email' => '-', 'instagram' => '-']],
            ['id' => 43, 'slug' => 'lentog-tanjung-bang-saiful', 'contact' => ['whatsapp' => '085747474714', 'email' => '-', 'instagram' => '-']],
            ['id' => 44, 'slug' => 'berkah-es-buah', 'contact' => ['whatsapp' => '085888445959', 'email' => '-', 'instagram' => '-']],
            ['id' => 45, 'slug' => 'warnet-jaya-sentosa', 'contact' => ['whatsapp' => '085640256542', 'email' => '-', 'instagram' => '-']],
            ['id' => 46, 'slug' => 'warung-mie-dadat', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 47, 'slug' => 'toko-risfan-snack', 'contact' => ['whatsapp' => '085641315977', 'email' => '-', 'instagram' => '-']],
            ['id' => 48, 'slug' => 'js-muslim-collection', 'contact' => ['whatsapp' => '08156577137', 'email' => '-', 'instagram' => '-']],
            ['id' => 49, 'slug' => 'kios-hjh', 'contact' => ['whatsapp' => '089671210252', 'email' => '-', 'instagram' => '-']],
            ['id' => 50, 'slug' => 'jahe-rempah-leggit', 'contact' => ['whatsapp' => '081939666657', 'email' => '-', 'instagram' => '-']],
            ['id' => 51, 'slug' => 'warung-makan-bu-carik', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 52, 'slug' => 'tehatea-indonesia', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 53, 'slug' => 'warung-makan-2-putra', 'contact' => ['whatsapp' => '0895383599877', 'email' => '-', 'instagram' => '-']],
            ['id' => 54, 'slug' => 'jasa-angkut-barang', 'contact' => ['whatsapp' => '085691006788', 'email' => '-', 'instagram' => '-']],
            ['id' => 55, 'slug' => 'sego-sambel-lek-kas2', 'contact' => ['whatsapp' => '081466712358', 'email' => '-', 'instagram' => '-']],
            ['id' => 56, 'slug' => 'toko-jamaah', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 57, 'slug' => 'mm-amanah', 'contact' => ['whatsapp' => '082322911886', 'email' => '-', 'instagram' => '-']],
            ['id' => 58, 'slug' => 'toko-van-helen', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 59, 'slug' => 'lina-family', 'contact' => ['whatsapp' => '087746212705', 'email' => '-', 'instagram' => '-']],
            ['id' => 60, 'slug' => 'susu-moeria', 'contact' => ['whatsapp' => '087825368484', 'email' => '-', 'instagram' => 'susumoeriacafe']],
            ['id' => 61, 'slug' => 'ramboo-chicken', 'contact' => ['whatsapp' => '085800008696', 'email' => '-', 'instagram' => 'ramboochicken']],
            ['id' => 62, 'slug' => 'es-gempol-pak-masykur', 'contact' => ['whatsapp' => '085640087033', 'email' => '-', 'instagram' => '-']],
            ['id' => 63, 'slug' => 'sultan-barber-top', 'contact' => ['whatsapp' => '085184711418', 'email' => '-', 'instagram' => 'sultan_barbertop.id']],
            ['id' => 64, 'slug' => 'soto-kudus-bu-jatmi', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => 'sotokudusbujatmi']],
            ['id' => 65, 'slug' => 'treend-steak-kudus', 'contact' => ['whatsapp' => '081227140405', 'email' => '-', 'instagram' => 'treendsteakkudus']],
            ['id' => 66, 'slug' => 'larees-jaya-electronics', 'contact' => ['whatsapp' => '0291438130', 'email' => '-', 'instagram' => '-']],
            ['id' => 67, 'slug' => 'es-coklat-cokot-kudus', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 68, 'slug' => 'richie-store-kudus', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => 'richiestorepati']],
            ['id' => 69, 'slug' => 'xgam-tech', 'contact' => ['whatsapp' => '081229484129', 'email' => '-', 'instagram' => '-']],
            ['id' => 70, 'slug' => 'jasa-las-dan-bubut-mulyo-rejo', 'contact' => ['whatsapp' => '085740789456', 'email' => '-', 'instagram' => '-']],
            ['id' => 71, 'slug' => 'putra-kalimosodo', 'contact' => ['whatsapp' => '085899447002', 'email' => '-', 'instagram' => '-']],
            ['id' => 72, 'slug' => 'ikan-bakar-nasuky-mubarok-jepang', 'contact' => ['whatsapp' => '081232281179', 'email' => '-', 'instagram' => '-']],
            ['id' => 73, 'slug' => 'rm-bu-sarah', 'contact' => ['whatsapp' => '089647857231', 'email' => '-', 'instagram' => '-']],
            ['id' => 74, 'slug' => 'sate-kambing-pak-brewok', 'contact' => ['whatsapp' => '081390443331', 'email' => '-', 'instagram' => '-']],
            ['id' => 75, 'slug' => 'loh-jinawi', 'contact' => ['whatsapp' => '081390784335', 'email' => '-', 'instagram' => '-']],
            ['id' => 76, 'slug' => 'toko-auralia', 'contact' => ['whatsapp' => '087805412326', 'email' => '-', 'instagram' => '-']],
            ['id' => 77, 'slug' => 'sekar-modiste', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 78, 'slug' => 'hasna-fashion', 'contact' => ['whatsapp' => '087828396335', 'email' => '-', 'instagram' => '-']],
            ['id' => 79, 'slug' => 'queen-seblak-prasmanan', 'contact' => ['whatsapp' => '085278090870', 'email' => '-', 'instagram' => '-']],
            ['id' => 80, 'slug' => 'ayam-geprek-mak-ginting', 'contact' => ['whatsapp' => '-', 'email' => '-', 'instagram' => '-']],
            ['id' => 81, 'slug' => 'warung-sate-dan-gule-pak-sugiyo', 'contact' => ['whatsapp' => '081215470578', 'email' => '-', 'instagram' => '-']],
            ['id' => 82, 'slug' => 'mj-teknik', 'contact' => ['whatsapp' => '081215504068', 'email' => '-', 'instagram' => '-']],
            ['id' => 83, 'slug' => 'fotocopy-dan-jasa-travel', 'contact' => ['whatsapp' => '085866575305', 'email' => '-', 'instagram' => '-']],
            ['id' => 84, 'slug' => 'ngabus-rejo', 'contact' => ['whatsapp' => '085757718417', 'email' => '-', 'instagram' => '-']],
            ['id' => 85, 'slug' => 'nano-distro', 'contact' => ['whatsapp' => '085641349300', 'email' => '-', 'instagram' => '-']],
            ['id' => 86, 'slug' => 'ilbabalanos', 'contact' => ['whatsapp' => '085747807706', 'email' => '-', 'instagram' => '-']],
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
