<?php

namespace Database\Seeders;

use App\Models\Umkm;
use App\Models\UmkmMenu;
use Illuminate\Database\Seeder;

class UmkmMenuSeeder extends Seeder
{
    public function run(): void
    {
        $umkms = Umkm::pluck('id', 'slug')->all();

        $umkmMenus = [
            // BAE
            'warung-makan-om-w' => [
                ['name' => 'Rica Entok', 'description' => 'Rica entok dengan bumbu khas Kudus.', 'price' => 'Rp 22.000', 'image' => 'uploads/umkm/omw_menu1.webp'],
                ['name' => 'Ayam Goreng', 'description' => 'Ayam goreng bumbu spesial dengan sambal terasi.', 'price' => 'Rp 22.000', 'image' => 'uploads/umkm/omw_menu2.webp'],
                ['name' => 'Tongseng Entok', 'description' => 'Tongseng entok dengan bumbu khas Kudus.', 'price' => 'Rp 22.000', 'image' => 'uploads/umkm/omw_menu3.webp'],
                ['name' => 'Tonbas Entog', 'description' => 'Tonbas entog dengan bumbu khas Kudus.', 'price' => 'Rp 22.000', 'image' => 'uploads/umkm/omw_menu4.webp'],
            ],
            'ayam-geprek-jawi' => [
                ['name' => 'Ayam Geprek Original', 'description' => 'Ayam geprek dengan sambal pedas khas Jawi.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/geprekjawi_menu1.webp'],
                ['name' => 'Ayam Geprek Sambal Matah', 'description' => 'Ayam geprek dengan taburan keju leleh.', 'price' => 'Rp 13.000', 'image' => 'uploads/umkm/geprekjawi_menu2.webp'],
                ['name' => 'Ayam Geprek Mozarella', 'description' => 'Ayam geprek dengan saus mozarella gurih.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/geprekjawi_menu3.webp'],
                ['name' => 'Lele Geprek', 'description' => 'Lele geprek dengan sambal pedas khas Jawi.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/geprekjawi_menu4.webp'],
            ],
            'soto-lamongan-mbak-yuli' => [
                ['name' => 'Soto Lamongan', 'description' => 'Soto ayam kuah bening dengan koya khas Lamongan.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/lamonganyuli_menu1.webp'],
            ],
            'es-cincau-pasundan' => [
                ['name' => 'Es Cincau Pasundan', 'description' => 'Minuman cincau hitam dengan gula merah cair.', 'price' => 'Rp 5.000', 'image' => 'uploads/umkm/cincaupasundan_menu1.webp'],
            ],
            'jasa-tulis-kudus' => [
                ['name' => 'Jasa Tugas', 'description' => 'Melayani pengetikan tugas sekolah dan kuliah.', 'price' => 'Mulai Rp 5.000', 'image' => 'uploads/umkm/jasatulis_menu1.webp'],
                ['name' => 'Jasa Tulis Tangan', 'description' => 'Melayani penulisan dokumen secara manual.', 'price' => 'Mulai Rp 3.000', 'image' => 'uploads/umkm/jasatulis_menu2.webp'],
                ['name' => 'Jasa Edit', 'description' => 'Melayani editing dokumen dan tata bahasa.', 'price' => 'Mulai Rp 20.000', 'image' => 'uploads/umkm/jasatulis_menu3.webp'],
                ['name' => 'Jasa Ketik', 'description' => 'Melayani pengetikan dokumen cepat dan rapi.', 'price' => 'Mulai Rp 4.000', 'image' => 'uploads/umkm/jasatulis_menu4.webp'],
            ],

            // DAWE
            'swike-dawe-restaurant' => [
                ['name' => 'Sop Daging', 'description' => 'Sop daging sapi dengan kuah bening segar.', 'price' => 'Rp 30.000', 'image' => 'uploads/umkm/swikedawe_menu1.webp'],
                ['name' => 'Swike Kuah dan Pepes Telur Kodok', 'description' => 'Swike kodok kuah tauco dan pepes telur kodok.', 'price' => 'Rp 50.000', 'image' => 'uploads/umkm/swikedawe_menu2.webp'],
            ],
            'wekate-gank' => [
                ['name' => 'Berbagai Aneka Minuman', 'description' => 'Aneka minuman segar dan kopi kekinian.', 'price' => 'Mulai Rp 5.000', 'image' => 'uploads/umkm/wekategank_menu1.webp'],
            ],
            'rumah-makan-mak-kiyem' => [
                ['name' => 'Pecel', 'description' => 'Nasi dengan sayur pecel dan lauk pilihan.', 'price' => 'Rp 7.000', 'image' => 'uploads/umkm/makkiyem_menu1.webp'],
                ['name' => 'Rames Lodeh Bu Kiyem', 'description' => 'Rames khas Kudus dengan lauk lodeh.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/makkiyem_menu2.webp'],
            ],
            'jasa-angkut-dan-pasir-bata-merah-jumbo' => [
                ['name' => 'Jasa Angkut Pasir', 'description' => 'Layanan pengiriman dan pengangkutan pasir bangunan ke lokasi proyek dengan cepat dan tepat waktu.', 'price' => 'Rp 150.000', 'image' => 'uploads/umkm/jasaangkutdll_menu1.webp'],
                ['name' => 'Jasa Angkut Bata Merah Jumbo', 'description' => 'Pengiriman bata merah jumbo dalam jumlah besar dengan tenaga profesional dan kendaraan angkut khusus.', 'price' => 'Rp 120.000', 'image' => 'uploads/umkm/jasaangkutdll_menu2.webp'],
                ['name' => 'Jasa Angkut Pindahan', 'description' => 'Melayani jasa pindahan rumah, kos, maupun kantor dengan kendaraan bak dan tenaga angkut berpengalaman.', 'price' => 'Rp 250.000', 'image' => 'uploads/umkm/jasaangkutdll_menu3.webp'],
            ],
            'ayam-geprek-sai' => [
                ['name' => 'Geprek Paha', 'description' => 'Ayam bagian paha yang digoreng renyah lalu digeprek dengan sambal pedas khas Sai Dawe. Cocok untuk kamu yang suka sensasi gurih dan lembutnya daging ayam.', 'price' => 'Rp 13.500', 'image' => 'uploads/umkm/sai_menu1.webp'],
                ['name' => 'Paket Geprek 3', 'description' => 'Paket hemat berisi ayam geprek, nasi hangat, sambal pedas, dan lalapan segar. Pilihan pas untuk makan siang atau malam bersama teman dan keluarga.', 'price' => 'Rp 17.000', 'image' => 'uploads/umkm/sai_menu2.webp'],
                ['name' => 'Nasi Goreng', 'description' => 'Nasi goreng khas Sai Dawe dengan bumbu rumahan gurih, potongan ayam, dan telur. Disajikan hangat dan siap menggugah selera.', 'price' => 'Rp 14.000', 'image' => 'uploads/umkm/sai_menu3.webp'],
                ['name' => 'Burger', 'description' => 'Roti lembut dengan isian ayam crispy, sayuran segar, dan saus spesial Sai Dawe. Nikmat untuk camilan sore atau makan cepat.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/sai_menu4.webp'],
            ],

            // GEBOG
            'warung-makan-mbah-sapar' => [
                ['name' => 'Sop', 'description' => 'Sop daging kerbau dengan kuah bening segar.', 'price' => 'Rp 5.000', 'image' => 'uploads/umkm/mbahsapar_menu1.webp'],
                ['name' => 'Nasi Pecel', 'description' => 'Nasi dengan sayur pecel dan lauk pilihan.', 'price' => 'Rp 7.000', 'image' => 'uploads/umkm/mbahsapar_menu2.webp'],
                ['name' => 'Aneka Jamu', 'description' => 'Berbagai minuman jamu tradisional segar.', 'price' => 'Mulai Rp 5.000', 'image' => 'uploads/umkm/mbahsapar_menu3.webp'],
            ],
            'nasi-uduk-dan-nasi-kuning-gang-satu' => [
                ['name' => 'Nasi Uduk', 'description' => 'Nasi uduk dengan lauk pilihan dan sambal khas.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/nasiuduk_menu1.webp'],
                ['name' => 'Nasi Kuning', 'description' => 'Nasi kuning dengan lauk lengkap dan sambal terasi.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/nasiuduk_menu2.webp'],
            ],
            'sari-rasa-bakso-malvinas' => [
                ['name' => 'Bakso Urat', 'description' => 'Bakso sapi dengan urat kenyal, kuah gurih, dan taburan bawang goreng yang menggugah selera.', 'price' => 'Rp 16.000', 'image' => 'uploads/umkm/malvinas_menu1.webp'],
                ['name' => 'Mie Bakso', 'description' => 'Perpaduan mie kenyal dengan bakso sapi dan kuah kaldu hangat yang lezat.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/malvinas_menu2.webp'],
                ['name' => 'Es Jeruk', 'description' => 'Minuman segar dari perasan jeruk asli, cocok untuk menemani hidangan panasmu.', 'price' => 'Rp 5.000', 'image' => 'uploads/umkm/malvinas_menu3.webp'],
            ],
            'warung-makan-mak-ru' => [
                ['name' => 'Nasi Pindang Kerbau', 'description' => 'Hidangan khas Kudus dengan kuah rempah pekat dan irisan daging kerbau empuk, disajikan bersama nasi hangat dan bawang goreng.', 'price' => 'Rp 18.000', 'image' => 'uploads/umkm/makru_menu1.webp'],
                ['name' => 'Nasi Rames Telur', 'description' => 'Nasi dengan lauk telur, sayur lodeh, sambal pedas, dan tambahan tempe goreng khas rumahan.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/makru_menu2.webp'],
                ['name' => 'Nasi Sop', 'description' => 'Nasi putih hangat disajikan dengan sop ayam berkuah bening gurih berisi wortel, kentang, dan daun seledri segar.', 'price' => 'Rp 14.000', 'image' => 'uploads/umkm/makru_menu3.webp'],
                ['name' => 'Gorengan', 'description' => 'Aneka gorengan renyah seperti tempe, tahu isi, bakwan, dan mendoan yang digoreng hangat setiap hari.', 'price' => 'Rp 2.000/pcs', 'image' => 'uploads/umkm/makru_menu4.webp'],
                ['name' => 'Lalapan', 'description' => 'Lalapan segar berisi timun, kol, kemangi, dan sambal terasi pedas yang menambah selera makan.', 'price' => 'Rp 5.000', 'image' => 'uploads/umkm/makru_menu5.webp'],
                ['name' => 'Tempe Ayam Lele Jeroan', 'description' => 'Pilihan lauk lengkap — mulai dari ayam goreng, lele, tempe, hingga jeroan yang dibumbui dengan cita rasa khas rumahan.', 'price' => 'Rp 10.000 - Rp 18.000', 'image' => 'uploads/umkm/makru_menu6.webp'],
            ],
            'kasehito-works' => [
                ['name' => 'Jasa Pengeditan Video', 'description' => 'Layanan profesional untuk mengedit video promosi, konten media sosial, vlog, atau proyek kreatif dengan hasil rapi dan menarik. Menyediakan efek, transisi, color grading, serta penyesuaian musik sesuai kebutuhan klien.', 'price' => 'Rp 100.000', 'image' => 'uploads/umkm/kasehito_menu1.webp'],
            ],

            // JATI
            'cakrawala-sego-sambel' => [
                ['name' => 'Ayam Goreng', 'description' => 'Ayam kampung goreng dengan sambal khas Kudus.', 'price' => 'Rp 23.000', 'image' => 'uploads/umkm/cakrawala_menu1.webp'],
                ['name' => 'Lele Bakar', 'description' => 'Lele bakar dengan sambal khas Kudus.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/cakrawala_menu2.webp'],
                ['name' => 'Bebek Goreng', 'description' => 'Bebek goreng dengan sambal khas Kudus.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/cakrawala_menu3.webp'],
                ['name' => 'Ayam Bakar', 'description' => 'Ayam bakar dengan sambal khas Kudus.', 'price' => 'Rp 23.000', 'image' => 'uploads/umkm/cakrawala_menu4.webp'],
            ],
            'nasi-opor-sunggingan' => [
                ['name' => 'Nasi Opor Bakar', 'description' => 'Ayam kampung goreng dengan sambal khas Kudus.', 'price' => 'Rp 19.000', 'image' => 'uploads/umkm/opor_menu1.webp'],
                ['name' => 'Ceker', 'description' => 'Lele bakar dengan sambal khas Kudus.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/opor_menu2.webp'],
                ['name' => 'Garang Asem', 'description' => 'Bebek goreng dengan sambal khas Kudus.', 'price' => 'Rp 35.000', 'image' => 'uploads/umkm/opor_menu3.webp'],
                ['name' => 'Nasi Opor Sunggingan', 'description' => 'Ayam bakar dengan sambal khas Kudus.', 'price' => 'Rp 23.000', 'image' => 'uploads/umkm/opor_menu4.webp'],
                ['name' => 'Nasi Opor Ayam Panggang', 'description' => 'Ayam bakar dengan sambal khas Kudus.', 'price' => 'Rp 29.000', 'image' => 'uploads/umkm/opor_menu5.webp'],
                ['name' => 'Opor Ayam Sunggingan', 'description' => 'Ayam bakar dengan sambal khas Kudus.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/opor_menu6.webp'],
                ['name' => 'Kerupuk Udang', 'description' => 'Ayam bakar dengan sambal khas Kudus.', 'price' => 'Rp 7.000', 'image' => 'uploads/umkm/opor_menu7.webp'],
            ],
            'warung-enthog-pak-badi' => [
                ['name' => 'Tongseng Entog', 'description' => 'Potongan daging entog empuk dimasak dengan bumbu rempah khas Jawa dan kuah tongseng gurih pedas yang menggugah selera.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/pakbadi_menu1.webp'],
                ['name' => 'Entog Goreng', 'description' => 'Daging entog digoreng hingga renyah di luar namun tetap lembut di dalam, disajikan dengan sambal terasi dan nasi hangat.', 'price' => 'Rp 23.000', 'image' => 'uploads/umkm/pakbadi_menu2.webp'],
                ['name' => 'Entog Bumbu Sate', 'description' => 'Olahan entog dengan bumbu sate manis gurih, dibakar perlahan hingga meresap sempurna dan beraroma sedap.', 'price' => 'Rp 30.000', 'image' => 'uploads/umkm/pakbadi_menu3.webp'],
                ['name' => 'Tongseng Enthok Pak Badi', 'description' => 'Menu andalan Pak Badi! Daging entog dimasak dengan kuah tongseng kental penuh rempah dan sedikit pedas, bikin nagih di setiap suapan.', 'price' => 'Rp 27.000', 'image' => 'uploads/umkm/pakbadi_menu4.webp'],
                ['name' => 'Tong Seng Kepala Entok', 'description' => 'Kepala entog dimasak dengan kuah tongseng berbumbu pekat, cocok untuk pecinta rasa gurih dan kuat khas masakan tradisional Kudus.', 'price' => 'Rp 28.000', 'image' => 'uploads/umkm/pakbadi_menu5.webp'],
            ],
            'jasa-powder-coating-dan-platting-kudus' => [
                ['name' => 'Jasa Powder Coating', 'description' => 'Layanan pengecatan logam dengan teknologi powder coating berkualitas tinggi yang tahan lama, halus, dan anti karat. Cocok untuk velg, rangka motor, pagar, dan komponen industri.', 'price' => 'Rp 100.000', 'image' => 'uploads/umkm/coating_menu1.webp'],
                ['name' => 'Jasa Chrome Platting', 'description' => 'Proses pelapisan logam dengan efek chrome mengkilap yang elegan. Ideal untuk aksesoris motor, mobil, dan peralatan logam agar tampak baru dan mewah.', 'price' => 'Rp 150.000', 'image' => 'uploads/umkm/coating_menu2.webp'],
                ['name' => 'Repaint & Refinishing', 'description' => 'Perbaikan warna dan finishing ulang pada permukaan logam yang kusam atau terkelupas agar kembali mulus dan tampak seperti baru.', 'price' => 'Rp 80.000', 'image' => 'uploads/umkm/coating_menu3.webp'],
            ],
            'kedai-es-bang-maman' => [
                ['name' => 'Jus Buah Naga', 'description' => 'Perpaduan segar buah naga merah dengan susu kental manis dan es serut, menghasilkan rasa manis alami yang menyegarkan di setiap tegukan.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/maman_menu1.webp'],
                ['name' => 'Jus Jambu Merah', 'description' => 'Minuman jambu merah yang diblender halus dengan sedikit gula dan es batu, cocok dinikmati siang hari untuk menghilangkan dahaga.', 'price' => 'Rp 9.000', 'image' => 'uploads/umkm/maman_menu2.webp'],
                ['name' => 'Jus Alpukat', 'description' => 'Alpukat segar dikocok dengan susu dan cokelat kental, menghadirkan sensasi lembut, manis, dan nikmat khas Kedai Es Bang Maman.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/maman_menu3.webp'],
                ['name' => 'Ocean Blue', 'description' => 'Minuman dingin berwarna biru laut dengan rasa soda manis dan jeruk nipis yang segar — pilihan pas untuk penyegar suasana.', 'price' => 'Rp 11.000', 'image' => 'uploads/umkm/maman_menu4.webp'],
            ],

            // JEKULO
            'jus-pojokan' => [
                ['name' => 'Aneka Buah Jus dan Minuman', 'description' => 'Tersedia berbagai pilihan jus buah segar seperti jeruk, alpukat, mangga, jambu, dan semangka. Dibuat dari buah pilihan dengan rasa manis alami dan kesegaran maksimal.', 'price' => 'Rp 5.000 - Rp 25.000', 'image' => 'uploads/umkm/pojokan_menu1.webp'],
            ],
            'kedai-twins-seblak-bandung-juice-jekulo' => [
                ['name' => 'Seblak Mix', 'description' => 'Seblak khas Bandung dengan topping lengkap seperti ceker, sosis, kerupuk, dan bakso. Disajikan dengan kuah pedas gurih yang bisa disesuaikan tingkat kepedasannya.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/twins_menu1.webp'],
                ['name' => 'Jus Alpukat', 'description' => 'Jus alpukat segar dengan campuran susu kental manis dan cokelat, cocok diminum saat santai. Teksturnya lembut dan rasanya manis pas di lidah.', 'price' => 'Rp 5.000', 'image' => 'uploads/umkm/twins_menu2.webp'],
                ['name' => 'Mie Ayam Goreng', 'description' => 'Mie ayam dengan bumbu khas yang digoreng kering, disajikan bersama potongan ayam gurih dan sayuran segar. Cita rasa unik yang bikin nagih.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/twins_menu3.webp'],
            ],
            'lentog-tanjung-bang-saiful' => [
                ['name' => 'Lentog Tanjung', 'description' => 'Hidangan tradisional khas Kudus berisi lontong lembut, sayur lodeh nangka, dan tahu tempe bacem yang disiram kuah gurih santan. Cocok untuk sarapan dengan cita rasa sederhana namun nikmat.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/saiful_menu1.webp'],
            ],
            'berkah-es-buah' => [
                ['name' => 'Makanan Buah', 'description' => 'Segarnya campuran buah pilihan dengan sirup manis dan sedikit es serut, cocok untuk menyegarkan hari Anda.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/berkah_menu1.webp'],
                ['name' => 'Minuman Buah', 'description' => 'Minuman buah segar yang menyehatkan, dipadukan dengan topping jelly dan sirup favorit. Nikmat dimin  kapan saja.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/berkah_menu2.webp'],
            ],
            'warnet-jaya-sentosa' => [
                ['name' => 'Rental', 'description' => 'Sewa PC gaming atau workstation lengkap dengan koneksi internet cepat. Cocok untuk main game, belajar, atau browsing nyaman sepanjang hari.', 'price' => 'Rp 3.000 - Rp 20.000', 'image' => 'uploads/umkm/warnet_menu1.webp'],
            ],

            // KALIWUNGU
            'jahe-rempah-leggit' => [
                ['name' => 'Wedank Batuk', 'description' => 'Minuman jahe hangat dengan rempah pilihan yang menenangkan tenggorokan dan membantu meredakan batuk ringan.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/leggit_menu1.webp'],
                ['name' => 'Wedank Paseja', 'description' => 'Perpaduan jahe dan rempah tradisional yang hangat, cocok untuk menjaga stamina dan meningkatkan daya tahan tubuh.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/leggit_menu2.webp'],
                ['name' => 'Wedank Jaselang', 'description' => 'Jahe rempah hangat dicampur madu dan gula merah, memberikan rasa manis alami dan sensasi hangat yang menenangkan.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/leggit_menu3.webp'],
            ],
            'warung-makan-bu-carik' => [
                ['name' => 'Ikan Panggang', 'description' => 'Ikan segar dipanggang dengan bumbu khas Bu Carik, gurih dan lezat, cocok dinikmati dengan nasi hangat.', 'price' => 'Rp 18.000', 'image' => 'uploads/umkm/bucarik_menu1.webp'],
                ['name' => 'Ayam', 'description' => 'Ayam goreng renyah dengan bumbu tradisional, disajikan hangat untuk menemani makan siang atau malam.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/bucarik_menu2.webp'],
                ['name' => 'IkanLalapan', 'description' => 'Ikan segar disajikan dengan lalapan dan sambal pedas khas Bu Carik, cocok untuk pecinta rasa segar dan pedas.', 'price' => 'Rp 17.000', 'image' => 'uploads/umkm/bucarik_menu3.webp'],
                ['name' => 'Sayur Labu', 'description' => 'Sayur labu segar dimasak dengan bumbu rumahan, lembut dan gurih, pas sebagai lauk pendamping nasi.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/bucarik_menu4.webp'],
            ],
            'tehatea-indonesia' => [
                ['name' => 'Teh Original', 'description' => 'Teh klasik yang segar, nikmat diminum kapan saja untuk melepas dahaga dan menyegarkan pikiran.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/tehatea_menu1.webp'],
                ['name' => 'TehSusu', 'description' => 'Teh dicampur susu segar, creamy dan manis pas, cocok untuk menemani santai atau bekerja.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/tehatea_menu2.webp'],
            ],
            'warung-makan-2-putra' => [
                ['name' => 'Nasi Sop', 'description' => 'Sup hangat dengan potongan ayam dan sayuran segar, cocok dinikmati bersama nasi hangat.', 'price' => 'Rp 18.000', 'image' => 'uploads/umkm/putra_menu1.webp'],
                ['name' => 'Tempe Sambal Goreng', 'description' => 'Tempe goreng renyah disiram sambal khas Bu 2 Putra, gurih dan pedas pas untuk lauk harian.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/putra_menu2.webp'],
                ['name' => 'Pecel Teh Hangat', 'description' => 'Sayuran segar dengan bumbu kacang tradisional, pas sebagai pendamping nasi atau lauk lainnya.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/putra_menu3.webp'],
                ['name' => 'Lele Bumbu Kecap Spesial', 'description' => 'Lele goreng renyah disajikan dengan bumbu kecap manis pedas, nikmat dinikmati bersama nasi hangat.', 'price' => 'Rp 20.000', 'image' => 'uploads/umkm/putra_menu4.webp'],
            ],
            'jasa-angkut-barang' => [
                ['name' => 'Jasa Angkut Apapun', 'description' => 'Layanan angkut barang dengan armada lengkap, aman, dan terpercaya. Cocok untuk pindahan, kirim barang, atau keperluan logistik.', 'price' => 'Rp 100.000 - Rp 300.000', 'image' => 'uploads/umkm/angkut_menu1.webp'],
            ],

            // KOTA KUDUS
            'susu-moeria' => [
                ['name' => 'Susu Coklat', 'description' => 'Susu segar dengan rasa coklat manis dan creamy, cocok diminum dingin maupun hangat.', 'price' => 'Rp 9.000', 'image' => 'uploads/umkm/moeria_menu1.webp'],
                ['name' => 'Tteokbokki', 'description' => 'Camilan khas Korea berbahan kue beras kenyal dengan saus pedas manis yang menggugah selera.', 'price' => 'Rp 37.000', 'image' => 'uploads/umkm/moeria_menu2.webp'],
                ['name' => 'Blackpepper Chicken', 'description' => 'Ayam lembut dengan saus lada hitam khas Moeria yang gurih pedas dan nikmat.', 'price' => 'Rp 22.000', 'image' => 'uploads/umkm/moeria_menu3.webp'],
                ['name' => 'Tteokbokki Mozarella', 'description' => 'Tteokbokki pedas manis disajikan dengan lelehan keju mozarella lembut di atasnya.', 'price' => 'Rp 31.000', 'image' => 'uploads/umkm/moeria_menu4.webp'],
                ['name' => 'Susu Strawberry', 'description' => 'Perpaduan susu segar dan sirup strawberry alami yang menyegarkan.', 'price' => 'Rp 9.000', 'image' => 'uploads/umkm/moeria_menu5.webp'],
                ['name' => 'Budae Jigae', 'description' => 'Sup khas Korea berisi sosis, mie, dan tahu dalam kuah pedas gurih yang hangat.', 'price' => 'Rp 72.000', 'image' => 'uploads/umkm/moeria_menu6.webp'],
                ['name' => 'Sundubu Jigae', 'description' => 'Sup tahu lembut ala Korea dengan kuah pedas gurih dan isian seafood atau daging pilihan.', 'price' => 'Rp 48.000', 'image' => 'uploads/umkm/moeria_menu7.webp'],
                ['name' => 'Nasi Goreng Kimchi', 'description' => 'Nasi goreng dengan cita rasa khas kimchi Korea yang asam, pedas, dan menggugah selera.', 'price' => 'Rp 48.000', 'image' => 'uploads/umkm/moeria_menu8.webp'],
            ],
            'ramboo-chicken' => [
                ['name' => 'Dada Ramboo Fighter', 'description' => 'Ayam goreng tepung dengan sambal pedas khas Kudus.', 'price' => 'Rp 23.000', 'image' => 'uploads/umkm/ramboo_menu1.webp'],
                ['name' => 'Basic Breash', 'description' => 'Ayam bakar dengan olesan madu manis gurih.', 'price' => 'Rp 20.000', 'image' => 'uploads/umkm/ramboo_menu2.webp'],
                ['name' => 'Double Chicken', 'description' => 'Pedasnya nampol dengan sambal korek khas Ramboo Chicken.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/ramboo_menu3.webp'],
                ['name' => 'Kentang Goreng', 'description' => 'Ayam renyah gurih cocok untuk semua kalangan.', 'price' => 'Rp 11.000', 'image' => 'uploads/umkm/ramboo_menu4.webp'],
            ],
            'es-gempol-pak-masykur' => [
                ['name' => 'Putu Mayang', 'description' => 'Kue tradisional bertekstur kenyal dengan saus gula merah dan santan gurih, cocok dinikmati sebagai camilan manis yang menyegarkan.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/masykur_menu1.webp'],
                ['name' => 'Nasi Kering', 'description' => 'Nasi lengkap dengan lauk tradisional khas rumahan, praktis untuk sarapan atau makan siang cepat dengan rasa autentik.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/masykur_menu2.webp'],
            ],
            'sultan-barber-top' => [
                ['name' => 'Haircut', 'description' => 'Layanan potong rambut profesional dengan gaya sesuai tren terbaru dan bentuk wajah pelanggan.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/sultanbarbertop_menu1.webp'],
                ['name' => 'Haircut + Wash', 'description' => 'Potong rambut dilengkapi dengan cuci rambut agar hasil lebih maksimal dan segar.', 'price' => 'Rp 35.000', 'image' => 'uploads/umkm/sultanbarbertop_menu1.webp'],
                ['name' => 'Shaving / Beard Trim', 'description' => 'Cukur kumis atau janggut dengan hasil rapi dan aman menggunakan alat steril.', 'price' => 'Rp 20.000', 'image' => 'uploads/umkm/sultanbarbertop_menu1.webp'],
                ['name' => 'Hair Styling', 'description' => 'Penataan rambut menggunakan pomade atau wax premium agar tampil stylish setiap saat.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/sultanbarbertop_menu1.webp'],
            ],
            'soto-kudus-bu-jatmi' => [
                ['name' => 'Soto Kerbau', 'description' => 'Soto khas Kudus dengan daging kerbau empuk dan kuah bening gurih beraroma rempah.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/sotokudusbujatmi_menu1.webp'],
                ['name' => 'Soto Ayam', 'description' => 'Soto ayam khas Kudus dengan suwiran ayam kampung dan taburan bawang goreng melimpah.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/sotokudusbujatmi_menu2.webp'],
                ['name' => 'Perkedel Kentang', 'description' => 'Perkedel gurih renyah pelengkap soto yang dibuat dari kentang pilihan.', 'price' => 'Rp 4.000', 'image' => 'uploads/umkm/sotokudusbujatmi_menu3.webp'],
                ['name' => 'Es Kopyor', 'description' => 'Minuman segar dari kelapa kopyor asli yang cocok dinikmati setelah menyantap soto.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/sotokudusbujatmi_menu4.webp'],
            ],

            // MEJOBO
            'xgam-tech' => [
                ['name' => 'Servis Laptop Mati Total', 'description' => 'Perbaikan laptop yang tidak bisa menyala akibat kerusakan hardware, power supply, atau motherboard.', 'price' => 'Mulai Rp 250.000', 'image' => 'uploads/umkm/xgam_menu1.webp'],
                ['name' => 'Pembersihan & Ganti Pasta Thermal', 'description' => 'Membersihkan debu dan mengganti pasta thermal agar performa dan suhu laptop tetap optimal.', 'price' => 'Rp 100.000', 'image' => 'uploads/umkm/xgam_menu2.webp'],
                ['name' => 'Rakit PC Custom', 'description' => 'Layanan konsultasi dan perakitan PC sesuai kebutuhan Anda — untuk gaming, editing, atau kantor.', 'price' => 'Mulai Rp 200.000', 'image' => 'uploads/umkm/xgam_menu3.webp'],
            ],
            'jasa-las-dan-bubut-mulyo-rejo' => [
                ['name' => 'Jasa Las Besi & Konstruksi', 'description' => 'Melayani pembuatan dan perbaikan pagar, kanopi, tralis, serta rangka besi untuk berbagai kebutuhan industri maupun rumah tangga.', 'price' => 'Mulai Rp 150.000', 'image' => 'uploads/umkm/mulyorejo_menu1.webp'],
                ['name' => 'Pembuatan Mainan Anak dari Besi', 'description' => 'Menerima pesanan ayunan, jungkat-jungkit, dan perosotan dari bahan besi berkualitas — aman, kuat, dan berwarna menarik.', 'price' => 'Mulai Rp 300.000', 'image' => 'uploads/umkm/mulyorejo_menu2.webp'],
            ],
            'putra-kalimosodo' => [
                ['name' => 'Pasokan Material Bangunan Dan Mengantarkan', 'description' => 'Menyediakan berbagai material seperti pasir, batu kali, semen, dan sirtu, lengkap dengan layanan angkut untuk kebutuhan proyek konstruksi.', 'price' => 'Harga bervariasi sesuai jenis material dan jarak pengiriman', 'image' => 'uploads/umkm/kalimosodo_menu1.webp'],
                ['name' => 'Jasa Transportasi', 'description' => 'Melayani jasa transportasi umum maupun travel antar kota dengan armada nyaman, bersih, dan pengemudi berpengalaman.', 'price' => 'Mulai Rp 150.000 per trip', 'image' => 'uploads/umkm/kalimosodo_menu2.webp'],
            ],
            'ikan-bakar-nasuky-mubarok-jepang' => [
                ['name' => 'Ikan Gurame Bakar', 'description' => 'Gurame segar dibakar dengan bumbu kecap manis dan rempah pilihan, menghasilkan cita rasa gurih dan sedikit smokey khas Nusantara.', 'price' => 'Rp 85.000', 'image' => 'uploads/umkm/nasuky_menu1.webp'],
                ['name' => 'Gurame Goreng', 'description' => 'Ikan segar digoreng garing hingga keemasan, disajikan dengan sambal terasi pedas dan lalapan segar.', 'price' => 'Rp 85.000', 'image' => 'uploads/umkm/nasuky_menu2.webp'],
                ['name' => 'Ikan Bakar Ca Kangkung', 'description' => 'Perpaduan sempurna antara ikan bakar berbumbu khas dan tumis kangkung pedas gurih yang menggugah selera.', 'price' => 'Rp 93.000', 'image' => 'uploads/umkm/nasuky_menu3.webp'],
                ['name' => 'Nila Bakar Manis', 'description' => 'Ikan nila dibakar dengan olesan bumbu manis gurih khas Mubarok, cocok dinikmati bersama nasi hangat dan sambal bawang.', 'price' => 'Rp 70.000', 'image' => 'uploads/umkm/nasuky_menu4.webp'],
            ],
            'rm-bu-sarah' => [
                ['name' => 'Kepala Manyung', 'description' => 'Menu andalan RM Bu Sarah yang terkenal dengan kepala manyung empuk dan kuah rica pedas gurih khas pesisir. Cocok untuk pecinta makanan berkuah rempah.', 'price' => 'Rp 28.000', 'image' => 'uploads/umkm/sarah_menu1.webp'],
                ['name' => 'Mendoan Cinta', 'description' => 'Tempe tipis dibalut tepung berbumbu lalu digoreng setengah matang, disajikan hangat dengan sambal kecap dan cabai rawit segar.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/sarah_menu2.webp'],
                ['name' => 'Kakap Godog', 'description' => 'Ikan kakap segar dimasak dengan bumbu godog khas Jawa Tengah — gurih, sedikit pedas, dan beraroma rempah kuat.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/sarah_menu3.webp'],
                ['name' => 'Pecel Lele', 'description' => 'Lele goreng garing disajikan bersama sambal tomat pedas dan lalapan segar. Menu sederhana yang selalu jadi favorit pengunjung.', 'price' => 'Rp 20.000', 'image' => 'uploads/umkm/sarah_menu4.webp'],
            ],

            // UNDAAN
            'queen-seblak-prasmanan' => [
                ['name' => 'Seblak Original', 'description' => 'Seblak khas Bandung dengan kuah pedas gurih, isi kerupuk, telur, dan bumbu kencur yang menggugah selera.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/queenseblak_menu1.webp'],
                ['name' => 'Seblak Aci', 'description' => 'Perpaduan kenyalnya aci, kerupuk, dan topping sederhana dengan kuah pedas creamy yang bikin nagih.', 'price' => 'Rp 15.000', 'image' => 'uploads/umkm/queenseblak_menu2.webp'],
                ['name' => 'Seblak Bakso', 'description' => 'Kuah seblak pedas gurih dengan tambahan bakso sapi empuk dan topping khas Queen Seblak Prasmanan.', 'price' => 'Rp 18.000', 'image' => 'uploads/umkm/queenseblak_menu3.webp'],
                ['name' => 'Seblak Sayur', 'description' => 'Seblak sehat dengan isian sayur segar, telur, dan kerupuk dalam kuah ped pedas gurih yang hangat di perut.', 'price' => 'Rp 16.000', 'image' => 'uploads/umkm/queenseblak_menu4.webp'],
            ],
            'ayam-geprek-mak-ginting' => [
                ['name' => 'Ayam Geprek Pedas Manis', 'description' => 'Ayam goreng krispi disiram sambal pedas manis khas Mak Ginting, perpaduan rasa gurih, pedas, dan sedikit manis yang pas di lidah.', 'price' => 'Rp 10.000', 'image' => 'uploads/umkm/makginting_menu1.webp'],
                ['name' => 'Mie Geprek Komplit', 'description' => 'Mie gurih disajikan dengan ayam geprek, telur mata sapi, dan sambal pilihan — cocok untuk pecinta pedas dan porsi kenyang.', 'price' => 'Rp 12.000', 'image' => 'uploads/umkm/makginting_menu2.webp'],
                ['name' => 'Seblak Biasa', 'description' => 'Seblak khas Mak Ginting dengan kuah pedas gurih, isi kerupuk, telur, dan topping sederhana yang menggugah selera.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/makginting_menu3.webp'],
                ['name' => 'Ayam Geprek', 'description' => 'Menu andalan Mak Ginting — ayam goreng tepung yang digeprek dengan sambal bawang pedas, disajikan bersama nasi hangat.', 'price' => 'Rp 8.000', 'image' => 'uploads/umkm/makginting_menu4.webp'],
            ],
            'warung-sate-dan-gule-pak-sugiyo' => [
                ['name' => 'Sate', 'description' => 'Sate kambing empuk dibakar dengan bumbu kecap manis, bawang, dan sedikit sambal, menghasilkan cita rasa gurih manis khas Kudus.', 'price' => 'Rp 25.000', 'image' => 'uploads/umkm/sugiyo_menu1.webp'],
                ['name' => 'Gule', 'description' => 'Gule kambing berkuah santan kental dengan rempah khas Jawa, disajikan hangat bersama nasi putih atau lontong.', 'price' => 'Rp 20.000', 'image' => 'uploads/umkm/sugiyo_menu2.webp'],
            ],
            'mj-teknik' => [
                ['name' => 'Instalasi Listrik Rumah & Gedung', 'description' => 'Pemasangan instalasi listrik baru maupun perbaikan sistem kelistrikan lama, dilakukan oleh teknisi berpengalaman dengan standar keamanan tinggi.', 'price' => 'Mulai Rp 250.000', 'image' => 'uploads/umkm/mjteknik_menu1.webp'],
                ['name' => 'Servis Pompa Air & Sibel', 'description' => 'Menangani kerusakan pompa air, penggantian sparepart, hingga pembuatan sumur sibel dengan hasil kuat dan aliran air lancar.', 'price' => 'Mulai Rp 300.000', 'image' => 'uploads/umkm/mjteknik_menu2.webp'],
                ['name' => 'Perbaikan Peralatan Rumah Tangga', 'description' => 'Jasa servis kipas angin, blender, mesin cuci, dan peralatan rumah tangga lainnya dengan biaya terjangkau dan hasil memuaskan.', 'price' => 'Mulai Rp 100.000', 'image' => 'uploads/umkm/mjteknik_menu3.webp'],
            ],
            'fotocopy-dan-jasa-travel' => [
                ['name' => 'Layanan Fotocopy & Travel', 'description' => 'Melayani fotokopi dokumen hitam putih maupun berwarna, print, scan, serta jasa travel antar kota dengan pelayanan cepat, ramah, dan harga terjangkau.', 'price' => 'Mulai Rp 2.000 per lembar / Rp 150.000 per trip', 'image' => 'uploads/umkm/jasatravel_menu1.webp'],
            ],
        ];

        foreach ($umkmMenus as $slug => $menus) {
            if (!isset($umkms[$slug])) {
                $this->command->warn("UMKM (untuk Menu) tidak ditemukan: {$slug}. Dilewati.");
                continue;
            }

            $umkmId = $umkms[$slug];

            foreach ($menus as $menuData) {
                UmkmMenu::updateOrCreate(
                    [
                        'umkm_id' => $umkmId,
                        'name' => $menuData['name'],
                    ],
                    [
                        'description' => $menuData['description'],
                        'price' => $menuData['price'],
                        'image' => $menuData['image'],
                        'status' => 'active',
                    ]
                );
            }
        }
    }
}