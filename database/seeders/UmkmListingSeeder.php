<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\UmkmListing;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\URL; // URL tidak terpakai, bisa dihapus

class UmkmListingSeeder extends Seeder
{
    public function run(): void
    {
        $umkms = Umkm::pluck('id', 'slug')->all();

        // UBAH INI: Gunakan jalur relatif dari folder 'storage/app/public/'
        $baseRelativePath = 'uploads/umkm/';

        $dataListings = [
            // === BAE (ID 1–5) ===
            [
                'slug' => 'warung-makan-om-w',
                'category' => 'Makanan',
                'subtitle' => 'Warung sederhana khas Kudus dengan cita rasa rumahan yang lezat dan harga bersahabat.',
                'location' => 'Bae',
                'kecamatan_slug' => 'bae',
                // UBAH INI: Gunakan $baseRelativePath
                'image' => $baseRelativePath . 'omw_hero.webp',
            ],
            [
                'slug' => 'ayam-geprek-jawi',
                'category' => 'Makanan',
                'subtitle' => 'Menyajikan ayam geprek pedas dengan sambal khas yang menggugah selera.',
                'location' => 'Bae',
                'kecamatan_slug' => 'bae',
                'image' => $baseRelativePath . 'geprekjawi_hero.webp',
            ],
            [
                'slug' => 'soto-lamongan-mbak-yuli',
                'category' => 'Makanan',
                'subtitle' => 'Soto Lamongan gurih dengan koya melimpah dan potongan ayam kampung.',
                'location' => 'Bae',
                'kecamatan_slug' => 'bae',
                'image' => $baseRelativePath . 'lamonganyuli_hero.webp',
            ],
            [
                'slug' => 'es-cincau-pasundan',
                'category' => 'Minuman',
                'subtitle' => 'Minuman segar dengan cincau hitam khas Pasundan dan gula merah cair.',
                'location' => 'Bae',
                'kecamatan_slug' => 'bae',
                'image' => $baseRelativePath . 'cincaupasundan_hero.webp',
            ],
            [
                'slug' => 'jasa-tulis-kudus',
                'category' => 'Jasa',
                'subtitle' => 'Melayani jasa pengetikan, cetak dokumen, dan administrasi harian.',
                'location' => 'Bae',
                'kecamatan_slug' => 'bae',
                'image' => $baseRelativePath . 'jasatulis_hero.webp',
            ],

            // === DAWE (ID 6–10) ===
            [
                'slug' => 'swike-dawe-restaurant',
                'category' => 'Makanan',
                'subtitle' => 'Restoran legendaris menawarkan swike (kodok kuah tauco) khas Kudus.',
                'location' => 'Dawe',
                'kecamatan_slug' => 'dawe',
                'image' => $baseRelativePath . 'swikedawe_hero.webp',
            ],
            [
                'slug' => 'wekate-gank',
                'category' => 'Minuman',
                'subtitle' => 'Kafe & lounge nongkrong malam dengan suasana kekinian di Kudus.',
                'location' => 'Bae',
                'kecamatan_slug' => 'bae',
                'image' => $baseRelativePath . 'wekategank_hero.webp',
            ],
            [
                'slug' => 'rumah-makan-mak-kiyem',
                'category' => 'Makanan',
                'subtitle' => 'Warung makan malam hingga siang dengan aneka menu rumahan dan lodeh khas Kudus.',
                'location' => 'Dawe',
                'kecamatan_slug' => 'dawe',
                'image' => $baseRelativePath . 'makkiyem_hero.webp',
            ],
            [
                'slug' => 'jasa-angkut-dan-pasir-bata-merah-jumbo',
                'category' => 'Jasa',
                'subtitle' => 'Melayani kebutuhan material bangunan dan pengiriman barang dengan cepat, aman, dan terpercaya.',
                'location' => 'Dawe',
                'kecamatan_slug' => 'dawe',
                'image' => $baseRelativePath . 'jasaangkut_hero.webp',
            ],
            [
                'slug' => 'ayam-geprek-sai',
                'category' => 'Makanan',
                'subtitle' => 'Rasakan sensasi ayam geprek dengan sambal pilihan dan cita rasa khas yang disukai semua kalangan.',
                'location' => 'Dawe',
                'kecamatan_slug' => 'dawe',
                'image' => $baseRelativePath . 'ayamgepreksai_hero.webp',
            ],

            // === GEBOG (ID 11–15) ===
            [
                'slug' => 'warung-makan-mbah-sapar',
                'category' => 'Makanan',
                'subtitle' => 'Warung makan rumahan populer untuk sarapan dengan menu khas lokal di Kudus.',
                'location' => 'Gebog',
                'kecamatan_slug' => 'gebog',
                'image' => $baseRelativePath . 'mbahsapar_hero.webp',
            ],
            [
                'slug' => 'nasi-uduk-dan-nasi-kuning-gang-satu',
                'category' => 'Makanan',
                'subtitle' => 'Kedai sarapan pagi menyajikan nasi uduk dan nasi kuning khas Kudus sejak pagi hari.',
                'location' => 'Gebog',
                'kecamatan_slug' => 'gebog',
                'image' => $baseRelativePath . 'nasiuduk_hero.webp',
            ],
            [
                'slug' => 'sari-rasa-bakso-malvinas',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati kelezatan bakso khas Kudus dengan kuah gurih, daging pilihan, dan cita rasa yang selalu bikin rindu.',
                'location' => 'Gebog',
                'kecamatan_slug' => 'gebog',
                'image' => $baseRelativePath . 'baksomalvinas_hero.webp',
            ],
            [
                'slug' => 'warung-makan-mak-ru',
                'category' => 'Makanan',
                'subtitle' => 'Sajian masakan rumahan khas Kudus dengan cita rasa autentik, harga terjangkau, dan porsi yang memuaskan.',
                'location' => 'Gebog',
                'kecamatan_slug' => 'gebog',
                'image' => $baseRelativePath . 'warungmakanmakru_hero.webp',
            ],
            [
                'slug' => 'kasehito-works',
                'category' => 'Jasa',
                'subtitle' => 'Membantu kamu mengubah ide menjadi video menarik dengan sentuhan kreatif dan hasil berkualitas tinggi.',
                'location' => 'Gebog',
                'kecamatan_slug' => 'gebog',
                'image' => $baseRelativePath . 'kasehitoworks_hero.webp',
            ],

            // === JATI (ID 16–20) ===
            [
                'slug' => 'cakrawala-sego-sambel',
                'category' => 'Makanan',
                'subtitle' => 'Warung makan malam hingga larut yang populer dengan sego sambel dan lauk goreng-gorengan di Kudus.',
                'location' => 'Jati',
                'kecamatan_slug' => 'jati',
                'image' => $baseRelativePath . 'cakrawala_hero.webp',
            ],
            [
                'slug' => 'nasi-opor-sunggingan',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati sajian nasi opor dengan kuah santan gurih, ayam empuk, dan cita rasa tradisional yang autentik khas Kudus.',
                'location' => 'Jati',
                'kecamatan_slug' => 'jati',
                'image' => $baseRelativePath . 'oporsungginan_hero.webp',
            ],
            [
                'slug' => 'warung-enthog-pak-badi',
                'category' => 'Makanan',
                'subtitle' => 'Rasakan kelezatan daging enthog empuk dengan bumbu rempah khas Jawa, disajikan dengan nasi hangat dan sambal pedas.',
                'location' => 'Jati',
                'kecamatan_slug' => 'jati',
                'image' => $baseRelativePath . 'enthogpakbadi_hero.webp',
            ],
            [
                'slug' => 'jasa-powder-coating-dan-platting-kudus',
                'category' => 'Jasa',
                'subtitle' => 'Layanan pengecatan dan pelapisan logam dengan hasil rapi, kuat, dan tahan karat.',
                'location' => 'Jati',
                'kecamatan_slug' => 'jati',
                'image' => $baseRelativePath . 'powdercoating_hero.webp',
            ],
            [
                'slug' => 'kedai-es-bang-maman',
                'category' => 'Minuman',
                'subtitle' => 'Nikmati kesegaran berbagai varian es buatan Bang Maman, dari es campur hingga es buah segar.',
                'location' => 'Jati',
                'kecamatan_slug' => 'jati',
                'image' => $baseRelativePath . 'esbangmaman_hero.webp',
            ],

            // === JEKULO (ID 21–25) ===
            [
                'slug' => 'jus-pojokan',
                'category' => 'Minuman',
                'subtitle' => 'Nikmati beragam jus buah segar, kopi susu kekinian, dan camilan ringan dalam suasana santai di pojokan favorit warga Kudus.',
                'location' => 'Jekulo',
                'kecamatan_slug' => 'jekulo',
                'image' => $baseRelativePath . 'juspojokan_hero.webp',
            ],
            [
                'slug' => 'kedai-twins-seblak-bandung-juice-jekulo',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati perpaduan pedas gurih khas Seblak Bandung dan kesegaran jus buah alami dalam satu tempat yang nyaman dan ramah di Jekulo, Kudus.',
                'location' => 'Jekulo',
                'kecamatan_slug' => 'jekulo',
                'image' => $baseRelativePath . 'kedaytwins_hero.webp',
            ],
            [
                'slug' => 'lentog-tanjung-bang-saiful',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati perpaduan lontong lembut, sayur lodeh gurih, dan sambal khas Kudus yang melegenda. Cita rasa tradisional yang tetap autentik sejak dulu.',
                'location' => 'Jekulo',
                'kecamatan_slug' => 'jekulo',
                'image' => $baseRelativePath . 'lentogbangsyaiful_hero.webp',
            ],
            [
                'slug' => 'berkah-es-buah',
                'category' => 'Minuman',
                'subtitle' => 'Nikmati kesegaran potongan buah segar dengan sirup manis, susu kental, dan es serut yang menyegarkan. Cocok dinikmati di siang hari atau saat cuaca panas.',
                'location' => 'Jekulo',
                'kecamatan_slug' => 'jekulo',
                'image' => $baseRelativePath . 'berkahesbuah_hero.webp',
            ],
            [
                'slug' => 'warnet-jaya-sentosa',
                'category' => 'Jasa',
                'subtitle' => 'Nikmati pengalaman gaming terbaik dengan koneksi cepat, PC gaming lengkap, dan suasana nyaman untuk teman atau kerja sekolah.',
                'location' => 'Jekulo',
                'kecamatan_slug' => 'jekulo',
                'image' => $baseRelativePath . 'warnetjayasentosa_hero.webp',
            ],

            // === KALIWUNGU (ID 26–30) ===
            [
                'slug' => 'jahe-rempah-leggit',
                'category' => 'Minuman',
                'subtitle' => 'Nikmati sensasi hangat dan sehat dari perpaduan jahe segar, rempah pilihan, dan madu asli. Cocok dinikmati kapan saja untuk tubuh yang lebih bugar.',
                'location' => 'Kaliwungu',
                'kecamatan_slug' => 'kaliwungu',
                'image' => $baseRelativePath . 'jaherempahreggit_hero.webp',
            ],
            [
                'slug' => 'warung-makan-bu-carik',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati hidangan tradisional dengan cita rasa autentik, porsi melimpah, dan harga terjangkau. Cocok untuk sarapan, makan siang, atau makan malam.',
                'location' => 'Kaliwungu',
                'kecamatan_slug' => 'kaliwungu',
                'image' => $baseRelativePath . 'warungmakanbucarik_hero.webp',
            ],
            [
                'slug' => 'tehatea-indonesia',
                'category' => 'Minuman',
                'subtitle' => 'Nikmati berbagai minuman teh hangat maupun dingin dengan rasa autentik, paduan rempah dan bahan alami. Cocok untuk dinikmati kapan saja sebagai teman santai atau melepas dahaga.',
                'location' => 'Kaliwungu',
                'kecamatan_slug' => 'kaliwungu',
                'image' => $baseRelativePath . 'tehatea_hero.webp',
            ],
            [
                'slug' => 'warung-makan-2-putra',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati hidangan rumahan dengan cita rasa autentik, porsi melimpah, dan harga terjangkau. Cocok untuk sarapan, makan siang, atau makan malam.',
                'location' => 'Kaliwungu',
                'kecamatan_slug' => 'kaliwungu',
                'image' => $baseRelativePath . 'warungmakan2putra_hero.webp',
            ],
            [
                'slug' => 'jasa-angkut-barang',
                'category' => 'Jasa',
                'subtitle' => 'Melayani pengangkutan barang untuk kebutuhan rumah tangga, kantor, atau usaha dengan aman dan tepat waktu.',
                'location' => 'Kaliwungu',
                'kecamatan_slug' => 'kaliwungu',
                'image' => $baseRelativePath . 'jasaangkutbarang_hero.webp',
            ],

            // === KOTA KUDUS (ID 31–35) ===
            [
                'slug' => 'susu-moeria',
                'category' => 'Minuman',
                'subtitle' => 'Nikmati kesegaran susu murni pilihan yang diolah higienis dan tersedia dalam berbagai varian rasa. Cocok untuk semua usia dan waktu.',
                'location' => 'Kota Kudus',
                'kecamatan_slug' => 'kota-kudus',
                'image' => $baseRelativePath . 'susumoeria_hero.webp',
            ],
            [
                'slug' => 'ramboo-chicken',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati cita rasa ayam geprek khas Kudus dengan berbagai pilihan menu lezat dan harga terjangkau.',
                'location' => 'Kota Kudus',
                'kecamatan_slug' => 'kota-kudus',
                'image' => $baseRelativePath . 'ramboo_hero.webp',
            ],
            [
                'slug' => 'es-gempol-pak-masykur',
                'category' => 'Minuman',
                'subtitle' => 'Rasakan kesegaran es gempol dengan santan gurih, gula merah manis, dan aroma pandan yang khas. Minuman tradisional yang menyegarkan di setiap tegukan.',
                'location' => 'Kota Kudus',
                'kecamatan_slug' => 'kota-kudus',
                'image' => $baseRelativePath . 'gempol_hero.webp',
            ],
            [
                'slug' => 'sultan-barber-top',
                'category' => 'Jasa',
                'subtitle' => 'Barbershop modern di Kudus yang menawarkan potongan rambut bergaya, layanan premium, dan suasana nyaman untuk semua kalangan.',
                'location' => 'Kota Kudus',
                'kecamatan_slug' => 'kota-kudus',
                'image' => $baseRelativePath . 'sultanbarbertop_hero.webp',
            ],
            [
                'slug' => 'soto-kudus-bu-jatmi',
                'category' => 'Makanan',
                'subtitle' => 'Warung soto legendaris yang menjadi ikon kuliner khas Kudus, menyajikan cita rasa autentik dengan pilihan daging kerbau maupun ayam.',
                'location' => 'Kota Kudus',
                'kecamatan_slug' => 'kota-kudus',
                'image' => $baseRelativePath . 'sotokudusbujatmi_hero.webp',
            ],

            // === MEJOBO (ID 36–40) ===
            [
                'slug' => 'xgam-tech',
                'category' => 'Jasa',
                'subtitle' => 'Layanan profesional untuk perbaikan, upgrade, dan perawatan komputer maupun laptop dengan harga bersahabat.',
                'location' => 'Mejobo',
                'kecamatan_slug' => 'mejobo',
                'image' => $baseRelativePath . 'xgamtech_hero.webp',
            ],
            [
                'slug' => 'jasa-las-dan-bubut-mulyo-rejo',
                'category' => 'Jasa',
                'subtitle' => 'Melayani berbagai pekerjaan las, bubut, dan perakitan logam dengan hasil kuat, rapi, dan presisi.',
                'location' => 'Mejobo',
                'kecamatan_slug' => 'mejobo',
                'image' => $baseRelativePath . 'jasalas_hero.webp',
            ],
            [
                'slug' => 'putra-kalimosodo',
                'category' => 'Jasa',
                'subtitle' => 'Menyediakan berbagai bahan bangunan serta layanan angkut material dengan armada lengkap dan tepat waktu.',
                'location' => 'Mejobo',
                'kecamatan_slug' => 'mejobo',
                'image' => $baseRelativePath . 'kalimosodo_hero.webp',
            ],
            [
                'slug' => 'ikan-bakar-nasuky-mubarok-jepang',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati ikan bakar lezat dengan bumbu rempah khas dan suasana makan nyaman di daerah Jepang, Kudus.',
                'location' => 'Mejobo',
                'kecamatan_slug' => 'mejobo',
                'image' => $baseRelativePath . 'ikanbakar_hero.webp',
            ],
            [
                'slug' => 'rm-bu-sarah',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati berbagai hidangan rumahan khas Jawa dengan cita rasa autentik dan suasana nyaman seperti di rumah sendiri.',
                'location' => 'Mejobo',
                'kecamatan_slug' => 'mejobo',
                'image' => $baseRelativePath . 'rmbusarah_hero.webp',
            ],

            // === UNDAAN (ID 41–45) ===
            [
                'slug' => 'queen-seblak-prasmanan',
                'category' => 'Makanan',
                'subtitle' => 'Rasakan sensasi seblak pedas gurih dengan berbagai pilihan topping yang bisa kamu ambil sesuka hati.',
                'location' => 'Undaan',
                'kecamatan_slug' => 'undaan',
                'image' => $baseRelativePath . 'queenseblak_hero.webp',
            ],
            [
                'slug' => 'ayam-geprek-mak-ginting',
                'category' => 'Makanan',
                'subtitle' => 'Ayam goreng renyah yang digeprek dengan sambal super pedas khas Mak Ginting. Cocok buat pecinta pedas sejati!',
                'location' => 'Undaan',
                'kecamatan_slug' => 'undaan',
                'image' => $baseRelativePath . 'geprekmakginting_hero.webp',
            ],
            [
                'slug' => 'warung-sate-dan-gule-pak-sugiyo',
                'category' => 'Makanan',
                'subtitle' => 'Nikmati sate kambing empuk dan gule gurih beraroma rempah yang selalu bikin pelanggan datang lagi.',
                'location' => 'Undaan',
                'kecamatan_slug' => 'undaan',
                'image' => $baseRelativePath . 'warungsatedangule_hero.webp',
            ],
            [
                'slug' => 'mj-teknik',
                'category' => 'Jasa',
                'subtitle' => 'Melayani instalasi listrik, servis pompa air, dan perbaikan berbagai peralatan rumah tangga dengan tenaga ahli berpengalaman.',
                'location' => 'Undaan',
                'kecamatan_slug' => 'undaan',
                'image' => $baseRelativePath . 'mjteknik_hero.webp',
            ],
            [
                'slug' => 'fotocopy-dan-jasa-travel',
                'category' => 'Jasa',
                'subtitle' => 'Melayani jasa fotokopi, print, scan, serta layanan travel antar kota dengan pelayanan ramah dan harga terjangkau.',
                'location' => 'Undaan',
                'kecamatan_slug' => 'undaan',
                'image' => $baseRelativePath . 'fotocopy_hero.webp',
            ],
        ];

        foreach ($dataListings as $data) {
            if (!isset($umkms[$data['slug']])) {
                $this->command->warn('UMKM (Listing) tidak ditemukan: ' . $data['slug'] . '. Dilewati.');
                continue;
            }

            UmkmListing::updateOrCreate(
                ['umkm_id' => $umkms[$data['slug']]],
                [
                    'category' => $data['category'],
                    'subtitle' => $data['subtitle'],
                    'location' => $data['location'],
                    'kecamatan_slug' => $data['kecamatan_slug'],
                    'image' => $data['image'], // Sekarang hanya menyimpan 'uploads/umkm/namafile.webp'
                    'status' => 'active',
                ]
            );
        }
    }
}