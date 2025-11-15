<?php

namespace Database\Seeders;

use App\Models\GaleriUmkm;
use App\Models\Umkm;
use Illuminate\Database\Seeder;

class UmkmGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil ID UMKM berdasarkan slug
        $umkms = Umkm::pluck('id', 'slug')->all();

        // 2. Base URL untuk gambar galeri
        $baseUrl = 'uploads/umkm/';

        // 3. Data detail UMKM (hanya bagian galeri)
        $dataDetailUMKM = [
            [
                'slug' => 'warung-makan-om-w',
                'galleryImages' => [
                    $baseUrl . 'omw_galerifoto1.webp',
                    $baseUrl . 'omw_galerifoto2.webp',
                    $baseUrl . 'omw_galerifoto3.webp',
                    $baseUrl . 'omw_galerifoto4.webp',
                    $baseUrl . 'omw_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'ayam-geprek-jawi',
                'galleryImages' => [
                    $baseUrl . 'geprekjawi_galerifoto1.webp',
                    $baseUrl . 'geprekjawi_galerifoto2.webp',
                    $baseUrl . 'geprekjawi_galerifoto3.webp',
                    $baseUrl . 'geprekjawi_galerifoto4.webp',
                    $baseUrl . 'geprekjawi_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'soto-lamongan-mbak-yuli',
                'galleryImages' => [
                    $baseUrl . 'lamonganyuli_galerifoto1.webp',
                    $baseUrl . 'lamonganyuli_galerifoto2.webp',
                    $baseUrl . 'lamonganyuli_galerifoto3.webp',
                    $baseUrl . 'lamonganyuli_galerifoto4.webp',
                    $baseUrl . 'lamonganyuli_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'es-cincau-pasundan',
                'galleryImages' => [
                    $baseUrl . 'cincaupasundan_galerifoto1.webp',
                    $baseUrl . 'cincaupasundan_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'jasa-tulis-kudus',
                'galleryImages' => [
                    $baseUrl . 'jasatulis_galerifoto1.webp',
                    $baseUrl . 'jasatulis_galerifoto2.webp',
                    $baseUrl . 'jasatulis_galerifoto3.webp',
                    $baseUrl . 'jasatulis_galerifoto4.webp',
                    $baseUrl . 'jasatulis_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'resto-mvr-kudus',
                'galleryImages' => [
                    $baseUrl . 'mvr_galerifoto1.webp',
                    $baseUrl . 'mvr_galerifoto2.webp',
                    $baseUrl . 'mvr_galerifoto3.webp',
                    $baseUrl . 'mvr_galerifoto4.webp',
                    $baseUrl . 'mvr_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'vjo-cafe-bistro',
                'galleryImages' => [
                    $baseUrl . 'vjocafe_galerifoto1.webp',
                    $baseUrl . 'vjocafe_galerifoto2.webp',
                    $baseUrl . 'vjocafe_galerifoto3.webp',
                    $baseUrl . 'vjocafe_galerifoto4.webp',
                    $baseUrl . 'vjocafe_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'toko-al-maira',
                'galleryImages' => [
                    $baseUrl . 'tokoalmaira_galerifoto1.webp',
                    $baseUrl . 'tokoalmaira_galerifoto2.webp',
                    $baseUrl . 'tokoalmaira_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'siskanuna-boutique',
                'galleryImages' => [
                    $baseUrl . 'siskanuna_galerifoto1.webp',
                    $baseUrl . 'siskanuna_galerifoto2.webp',
                    $baseUrl . 'siskanuna_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'terebatik',
                'galleryImages' => [
                    $baseUrl . 'terebatik_galerifoto1.webp',
                    $baseUrl . 'terebatik_galerifoto2.webp',
                    $baseUrl . 'terebatik_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'swike-dawe-restaurant',
                'galleryImages' => [
                    $baseUrl . 'swikedawe_galerifoto1.webp',
                    $baseUrl . 'swikedawe_galerifoto2.webp',
                    $baseUrl . 'swikedawe_galerifoto3.webp',
                    $baseUrl . 'swikedawe_galerifoto4.webp',
                    $baseUrl . 'swikedawe_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'wekate-gank',
                'galleryImages' => [
                    $baseUrl . 'wekategank_galerifoto1.webp',
                    $baseUrl . 'wekategank_galerifoto2.webp',
                    $baseUrl . 'wekategank_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'rumah-makan-mak-kiyem',
                'galleryImages' => [
                    $baseUrl . 'makkiyem_galerifoto1.webp',
                    $baseUrl . 'makkiyem_galerifoto2.webp',
                    $baseUrl . 'makkiyem_galerifoto3.webp',
                    $baseUrl . 'makkiyem_galerifoto4.webp',
                    $baseUrl . 'makkiyem_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'jasa-angkut-dan-pasir-bata-merah-jumbo',
                'galleryImages' => [
                    $baseUrl . 'jasaangkutdll_galerifoto1.webp',
                    $baseUrl . 'jasaangkutdll_galerifoto2.webp',
                    $baseUrl . 'jasaangkutdll_galerifoto3.webp',
                    $baseUrl . 'jasaangkutdll_galerifoto4.webp',
                    $baseUrl . 'jasaangkutdll_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'ayam-geprek-sai',
                'galleryImages' => [
                    $baseUrl . 'sai_galerifoto1.webp',
                    $baseUrl . 'sai_galerifoto2.webp',
                    $baseUrl . 'sai_galerifoto3.webp',
                    $baseUrl . 'sai_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'warung-makan-sendang-mulia',
                'galleryImages' => [
                    $baseUrl . 'sendangmulia_galerifoto1.webp',
                    $baseUrl . 'sendangmulia_galerifoto2.webp',
                    $baseUrl . 'sendangmulia_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'toko-adib-azka',
                'galleryImages' => [
                    $baseUrl . 'tokoadib_galerifoto1.webp',
                    $baseUrl . 'tokoadib_galerifoto2.webp',
                    $baseUrl . 'tokoadib_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'toko-sri-dawe',
                'galleryImages' => [
                    $baseUrl . 'sridawe_galerifoto1.webp',
                    $baseUrl . 'sridawe_galerifoto2.webp',
                    $baseUrl . 'sridawe_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'arfan-outfit-kudus',
                'galleryImages' => [
                    $baseUrl . 'arfanoutfit_galerifoto1.webp',
                    $baseUrl . 'arfanoutfit_galerifoto2.webp',
                    $baseUrl . 'arfanoutfit_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'dinda-store-ds',
                'galleryImages' => [
                    $baseUrl . 'dindastore_galerifoto1.webp',
                    $baseUrl . 'dindastore_galerifoto2.webp',
                    $baseUrl . 'dindastore_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'warung-makan-mbah-sapar',
                'galleryImages' => [
                    $baseUrl . 'mbahsapar_galerifoto1.webp',
                    $baseUrl . 'mbahsapar_galerifoto2.webp',
                    $baseUrl . 'mbahsapar_galerifoto3.webp',
                    $baseUrl . 'mbahsapar_galerifoto4.webp',
                    $baseUrl . 'mbahsapar_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'nasi-uduk-dan-nasi-kuning-gang-satu',
                'galleryImages' => [
                    $baseUrl . 'nasiuduk_galerifoto1.webp',
                    $baseUrl . 'nasiuduk_galerifoto2.webp',
                    $baseUrl . 'nasiuduk_galerifoto3.webp',
                    $baseUrl . 'nasiuduk_galerifoto4.webp',
                    $baseUrl . 'nasiuduk_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'sari-rasa-bakso-malvinas',
                'galleryImages' => [
                    $baseUrl . 'malvinas_galerifoto1.webp',
                    $baseUrl . 'malvinas_galerifoto2.webp',
                    $baseUrl . 'malvinas_galerifoto3.webp',
                    $baseUrl . 'malvinas_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'warung-makan-mak-ru',
                'galleryImages' => [
                    $baseUrl . 'makru_galerifoto1.webp',
                    $baseUrl . 'makru_galerifoto2.webp',
                    $baseUrl . 'makru_galerifoto3.webp',
                    $baseUrl . 'makru_galerifoto4.webp',
                    $baseUrl . 'makru_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'kasehito-works',
                'galleryImages' => [
                    $baseUrl . 'kasehito_menu1.webp',
                ],
            ],
            [
                'slug' => 'basina-food',
                'galleryImages' => [
                    $baseUrl . 'basina_galerifoto1.webp',
                    $baseUrl . 'basina_galerifoto2.webp',
                    $baseUrl . 'basina_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'campaign-coffee',
                'galleryImages' => [
                    $baseUrl . 'campaigncoffee_galerifoto1.webp',
                    $baseUrl . 'campaigncoffee_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'toko-tna-jaya',
                'galleryImages' => [
                    $baseUrl . 'tokotnajaya_menu1.webp',
                ],
            ],
            [
                'slug' => 'toko-teguh-sudarsono',
                'galleryImages' => [
                    $baseUrl . 'tokoteguh_galerifoto1.webp',
                ],
            ],
            [
                'slug' => 'nilna-dion-collection',
                'galleryImages' => [
                    $baseUrl . 'nilnadion_galerifoto1.webp',
                    $baseUrl . 'nilnadion_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'toko-kastimah',
                'galleryImages' => [
                    $baseUrl . 'tokokastimah_galerifoto1.webp',
                    $baseUrl . 'tokokastimah_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'cakrawala-sego-sambel',
                'galleryImages' => [
                    $baseUrl . 'cakrawala_galerifoto1.webp',
                    $baseUrl . 'cakrawala_galerifoto2.webp',
                    $baseUrl . 'cakrawala_galerifoto3.webp',
                    $baseUrl . 'cakrawala_galerifoto4.webp',
                    $baseUrl . 'cakrawala_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'nasi-opor-sunggingan',
                'galleryImages' => [
                    $baseUrl . 'opor_galerifoto1.webp',
                    $baseUrl . 'opor_galerifoto2.webp',
                    $baseUrl . 'opor_galerifoto3.webp',
                    $baseUrl . 'opor_galerifoto4.webp',
                    $baseUrl . 'opor_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'warung-enthog-pak-badi',
                'galleryImages' => [
                    $baseUrl . 'pakbadi_galerifoto1.webp',
                    $baseUrl . 'pakbadi_galerifoto2.webp',
                    $baseUrl . 'pakbadi_galerifoto3.webp',
                    $baseUrl . 'pakbadi_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'jasa-powder-coating-dan-platting-kudus',
                'galleryImages' => [
                    $baseUrl . 'coating_galerifoto1.webp',
                    $baseUrl . 'coating_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'kedai-es-bang-maman',
                'galleryImages' => [
                    $baseUrl . 'maman_galerifoto1.webp',
                    $baseUrl . 'maman_galerifoto2.webp',
                    $baseUrl . 'maman_galerifoto3.webp',
                    $baseUrl . 'maman_galerifoto4.webp',
                    $baseUrl . 'maman_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'gravitasi-teras-muria',
                'galleryImages' => [
                    $baseUrl . 'gravitasi_galerifoto1.webp',
                    $baseUrl . 'gravitasi_galerifoto2.webp',
                    $baseUrl . 'gravitasi_galerifoto3.webp',
                    $baseUrl . 'gravitasi_galerifoto4.webp',
                    $baseUrl . 'gravitasi_galerifoto5.webp',
                    $baseUrl . 'gravitasi_galerifoto6.webp',
                ],
            ],
            [
                'slug' => 'toko-kliwon',
                'galleryImages' => [
                    $baseUrl . 'tokokliwon_galerifoto1.webp',
                    $baseUrl . 'tokokliwon_galerifoto2.webp',
                    $baseUrl . 'tokokliwon_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'toko-happy-kids',
                'galleryImages' => [
                    $baseUrl . 'tokohappy_galerifoto1.webp',
                    $baseUrl . 'tokohappy_galerifoto2.webp',
                    $baseUrl . 'tokohappy_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'nobby-kudus-extension',
                'galleryImages' => [
                    $baseUrl . 'nobby_galerifoto1.webp',
                    $baseUrl . 'nobby_galerifoto2.webp',
                    $baseUrl . 'nobby_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'jus-pojokan',
                'galleryImages' => [
                    $baseUrl . 'pojokan_galerifoto1.webp',
                    $baseUrl . 'pojokan_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'kedai-twins-seblak-bandung-juice-jekulo',
                'galleryImages' => [
                    $baseUrl . 'twins_galerifoto1.webp',
                    $baseUrl . 'twins_galerifoto2.webp',
                    $baseUrl . 'twins_galerifoto3.webp',
                    $baseUrl . 'twins_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'lentog-tanjung-bang-saiful',
                'galleryImages' => [
                    $baseUrl . 'saiful_galerifoto1.webp',
                    $baseUrl . 'saiful_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'berkah-es-buah',
                'galleryImages' => [
                    $baseUrl . 'berkah_galerifoto1.webp',
                    $baseUrl . 'berkah_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'warnet-jaya-sentosa',
                'galleryImages' => [
                    $baseUrl . 'warnet_menu1.webp',
                ],
            ],
            [
                'slug' => 'warung-mie-dadat',
                'galleryImages' => [
                    $baseUrl . 'miedadat_galerifoto1.webp',
                    $baseUrl . 'miedadat_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'toko-risfan-snack',
                'galleryImages' => [
                    $baseUrl . 'tokorisfan_galerifoto1.webp',
                    $baseUrl . 'tokorisfan_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'js-muslim-collection',
                'galleryImages' => [
                    $baseUrl . 'jsmuslim_galerifoto1.webp',
                    $baseUrl . 'jsmuslim_galerifoto2.webp',
                    $baseUrl . 'jsmuslim_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'kios-hjh',
                'galleryImages' => [
                    $baseUrl . 'kioshjh_galerifoto1.webp',
                    $baseUrl . 'kioshjh_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'jahe-rempah-leggit',
                'galleryImages' => [
                    $baseUrl . 'leggit_galerifoto1.webp',
                    $baseUrl . 'leggit_galerifoto2.webp',
                    $baseUrl . 'leggit_galerifoto3.webp',
                    $baseUrl . 'leggit_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'warung-makan-bu-carik',
                'galleryImages' => [
                    $baseUrl . 'bucarik_galerifoto1.webp',
                    $baseUrl . 'bucarik_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'tehatea-indonesia',
                'galleryImages' => [
                    $baseUrl . 'tehatea_galerifoto1.webp',
                ],
            ],
            [
                'slug' => 'warung-makan-2-putra',
                'galleryImages' => [
                    $baseUrl . 'putra_galerifoto1.webp',
                    $baseUrl . 'putra_galerifoto2.webp',
                    $baseUrl . 'putra_galerifoto3.webp',
                    $baseUrl . 'putra_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'jasa-angkut-barang',
                'galleryImages' => [
                    $baseUrl . 'angkut_galerifoto1.webp',
                    $baseUrl . 'angkut_galerifoto2.webp',
                    $baseUrl . 'angkut_galerifoto3.webp',
                    $baseUrl . 'angkut_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'sego-sambel-lek-kas2',
                'galleryImages' => [
                    $baseUrl . 'segosambel_galerifoto1.webp',
                    $baseUrl . 'segosambel_galerifoto2.webp',
                    $baseUrl . 'segosambel_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'toko-jamaah',
                'galleryImages' => [
                    $baseUrl . 'tokojemaah_galerifoto1.webp',
                    $baseUrl . 'tokojemaah_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'mm-amanah',
                'galleryImages' => [
                    $baseUrl . 'mmamanah_galerifoto1.webp',
                    $baseUrl . 'mmamanah_galerifoto2.webp',
                    $baseUrl . 'mmamanah_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'toko-van-helen',
                'galleryImages' => [
                    $baseUrl . 'tokovanhelen_galerifoto1.webp',
                    $baseUrl . 'tokovanhelen_galerifoto2.webp',
                    $baseUrl . 'tokovanhelen_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'lina-family',
                'galleryImages' => [
                    $baseUrl . 'linafamily_galerifoto1.webp',
                    $baseUrl . 'linafamily_galerifoto2.webp',
                    $baseUrl . 'linafamily_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'susu-moeria',
                'galleryImages' => [
                    $baseUrl . 'moeria_galerifoto1.webp',
                    $baseUrl . 'moeria_galerifoto2.webp',
                    $baseUrl . 'moeria_galerifoto3.webp',
                    $baseUrl . 'moeria_galerifoto4.webp',
                    $baseUrl . 'moeria_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'ramboo-chicken',
                'galleryImages' => [
                    $baseUrl . 'ramboo_galerifoto1.webp',
                    $baseUrl . 'ramboo_galerifoto2.webp',
                    $baseUrl . 'ramboo_galerifoto3.webp',
                    $baseUrl . 'ramboo_galerifoto4.webp',
                    $baseUrl . 'ramboo_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'es-gempol-pak-masykur',
                'galleryImages' => [
                    $baseUrl . 'masyur_galerifoto1.webp',
                    $baseUrl . 'masyur_galerifoto2.webp',
                    $baseUrl . 'masyur_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'sultan-barber-top',
                'galleryImages' => [
                    $baseUrl . 'sultanbarbertop_galerifoto1.webp',
                    $baseUrl . 'sultanbarbertop_galerifoto2.webp',
                    $baseUrl . 'sultanbarbertop_galerifoto3.webp',
                    $baseUrl . 'sultanbarbertop_galerifoto4.webp',
                    $baseUrl . 'sultanbarbertop_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'soto-kudus-bu-jatmi',
                'galleryImages' => [
                    $baseUrl . 'sotokudusbujatmi_galerifoto1.webp',
                    $baseUrl . 'sotokudusbujatmi_galerifoto2.webp',
                    $baseUrl . 'sotokudusbujatmi_galerifoto3.webp',
                    $baseUrl . 'sotokudusbujatmi_galerifoto4.webp',
                    $baseUrl . 'sotokudusbujatmi_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'treend-steak-kudus',
                'galleryImages' => [
                    $baseUrl . 'treendsteak_galerifoto1.webp',
                    $baseUrl . 'treendsteak_galerifoto2.webp',
                    $baseUrl . 'treendsteak_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'larees-jaya-electronics',
                'galleryImages' => [
                    $baseUrl . 'lareesjaya_galerifoto1.webp',
                    $baseUrl . 'lareesjaya_galerifoto2.webp',
                    $baseUrl . 'lareesjaya_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'es-coklat-cokot-kudus',
                'galleryImages' => [
                    $baseUrl . 'escoklat_galerifoto1.webp',
                    $baseUrl . 'escoklat_galerifoto2.webp',
                    $baseUrl . 'escoklat_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'richie-store-kudus',
                'galleryImages' => [
                    $baseUrl . 'richie_galerifoto1.webp',
                    $baseUrl . 'richie_galerifoto2.webp',
                    $baseUrl . 'richie_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'xgam-tech',
                'galleryImages' => [
                    $baseUrl . 'xgam_galerifoto1.webp',
                    $baseUrl . 'xgam_galerifoto2.webp',
                    $baseUrl . 'xgam_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'jasa-las-dan-bubut-mulyo-rejo',
                'galleryImages' => [
                    $baseUrl . 'mulyorejo_galerifoto1.webp',
                    $baseUrl . 'mulyorejo_galerifoto2.webp',
                    $baseUrl . 'mulyorejo_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'putra-kalimosodo',
                'galleryImages' => [
                    $baseUrl . 'kalimosodo_galerifoto1.webp',
                    $baseUrl . 'kalimosodo_galerifoto2.webp',
                    $baseUrl . 'kalimosodo_galerifoto3.webp',
                    $baseUrl . 'kalimosodo_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'ikan-bakar-nasuky-mubarok-jepang',
                'galleryImages' => [
                    $baseUrl . 'nasuky_galerifoto1.webp',
                    $baseUrl . 'nasuky_galerifoto2.webp',
                    $baseUrl . 'nasuky_galerifoto3.webp',
                    $baseUrl . 'nasuky_galerifoto4.webp',
                    $baseUrl . 'nasuky_galerifoto5.webp',
                ],
            ],
            [
                'slug' => 'rm-bu-sarah',
                'galleryImages' => [
                    $baseUrl . 'sarah_galerifoto1.webp',
                    $baseUrl . 'sarah_galerifoto2.webp',
                    $baseUrl . 'sarah_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'sate-kambing-pak-brewok',
                'galleryImages' => [
                    $baseUrl . 'pakbrewok_galerifoto1.webp',
                    $baseUrl . 'pakbrewok_galerifoto2.webp',
                    $baseUrl . 'pakbrewok_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'loh-jinawi',
                'galleryImages' => [
                    $baseUrl . 'lohjinawi_galerifoto1.webp',
                    $baseUrl . 'lohjinawi_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'toko-auralia',
                'galleryImages' => [
                    $baseUrl . 'tokoauralia_galerifoto1.webp',
                    $baseUrl . 'tokoauralia_galerifoto2.webp',
                    $baseUrl . 'tokoauralia_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'sekar-modiste',
                'galleryImages' => [
                    $baseUrl . 'sekar_galerifoto1.webp',
                    $baseUrl . 'sekar_galerifoto2.webp',
                    $baseUrl . 'sekar_galerifoto3.webp',
                    $baseUrl . 'sekar_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'hasna-fashion',
                'galleryImages' => [
                    $baseUrl . 'hasnafashion_galerifoto1.webp',
                ],
            ],
            [
                'slug' => 'queen-seblak-prasmanan',
                'galleryImages' => [
                    $baseUrl . 'queenseblak_galerifoto1.webp',
                    $baseUrl . 'queenseblak_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'ayam-geprek-mak-ginting',
                'galleryImages' => [
                    $baseUrl . 'makginting_galerifoto1.webp',
                    $baseUrl . 'makginting_galerifoto2.webp',
                    $baseUrl . 'makginting_galerifoto3.webp',
                    $baseUrl . 'makginting_galerifoto4.webp',
                ],
            ],
            [
                'slug' => 'warung-sate-dan-gule-pak-sugiyo',
                'galleryImages' => [
                    $baseUrl . 'sugiyo_galerifoto1.webp',
                    $baseUrl . 'sugiyo_galerifoto2.webp',
                ],
            ],
            [
                'slug' => 'mj-teknik',
                'galleryImages' => [
                    $baseUrl . 'mjteknik_galerifoto1.webp',
                    $baseUrl . 'mjteknik_galerifoto2.webp',
                    $baseUrl . 'mjteknik_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'fotocopy-dan-jasa-travel',
                'galleryImages' => [
                    $baseUrl . 'jasatravel_galerifoto1.webp',
                ],
            ],
            [
                'slug' => 'ngabus-rejo',
                'galleryImages' => [
                    $baseUrl . 'ngabusrejo_galerifoto1.webp',
                    $baseUrl . 'ngabusrejo_galerifoto2.webp',
                    $baseUrl . 'ngabusrejo_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'nano-distro',
                'galleryImages' => [
                    $baseUrl . 'nanodistro_galerifoto1.webp',
                    $baseUrl . 'nanodistro_galerifoto2.webp',
                    $baseUrl . 'nanodistro_galerifoto3.webp',
                ],
            ],
            [
                'slug' => 'ilbabalanos',
                'galleryImages' => [
                    $baseUrl . 'ilbabalanos_galerifoto1.webp',
                    $baseUrl . 'ilbabalanos_galerifoto2.webp',
                    $baseUrl . 'ilbabalanos_galerifoto3.webp',
                ],
            ],
        ];

        // 4. Looping dan masukkan data
        foreach ($dataDetailUMKM as $data) {
            if (!isset($umkms[$data['slug']])) {
                $this->command->warn('UMKM (Gallery) tidak ditemukan: ' . $data['slug'] . '. Dilewati.');
                continue;
            }

            if (empty($data['galleryImages'])) {
                continue;
            }

            $umkmId = $umkms[$data['slug']];

            foreach ($data['galleryImages'] as $imagePath) {
                GaleriUmkm::updateOrCreate(
                    [
                        'umkm_id' => $umkmId,
                        'image' => $imagePath,
                    ],
                    ['status' => 'active']
                );
            }
        }
    }
}
