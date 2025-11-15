<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryBlog;
use App\Models\ArticleBlog;

class ArticleBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseUrl = 'uploads/articles/';

        $kategoriBeritaDaerah = CategoryBlog::where('title', 'Berita Daerah')->first();
        $kategoriUmkm = CategoryBlog::where('title', 'UMKM')->first();

        if (!$kategoriBeritaDaerah || !$kategoriUmkm) {
            $this->command->error('Pastikan CategoryBlogSeeder sudah dijalankan dan kategori "Berita Daerah" & "UMKM" ada.');
            return;
        }
        $articles = [
            [
                'category_blog_id' => $kategoriBeritaDaerah->id,
                'author' => 'yandip prov jateng',
                'title' => 'Kudus Kenalkan Produk UMKM Unggulan ke Tingkat Nasional',
                'content' => 'BANDUNG – Pemerintah Kabupaten Kudus kembali mempromosikan produk-produk unggulannya di pameran tingkat nasional. Yakni, Indonesia Tourism & Trade Investment Expo 2023, di Festival Citylink, Bandung, Jumat (12/5/2023). “Alhamdullilah, setelah tiga tahun dilanda pandemi, tahun Ini Pemkab Kudus dapat kembali berperan serta di festival pameran nasional. Kali ini, kita pamerkan produk-produk unggulan Kudus, seperti kopi Colo, berbagai produk-produk UMKM Kudus, dan ragam kerajinan ekonomi kreatif,” jelas bupati, saat mengunjungi stan Pemkab Kudus. Selain mengunjungi stan Pemkab Kudus, bupati juga menyempatkan diri berkeliling ke stan dari kota dan kabupaten lain. Setelah berkeliling melihat produk unggulan UMKM dari berbagai daerah, dirinya yakin, produk UMKM Kudus memiliki kemampuan untuk bersaing. “Kualitas produk-produk lokal Kudus tidak kalah saing dengan daerah-daerah lain yang ada di Indonesia. Berbagai potensi unggulan sengaja kita pamerkan di berbagai event biar membahana, baik di dalam maupun luar daerah,” ungkapnya. Hartopo menyebut, keikutsertaan Pemkab Kudus dalam pameran nasional kali ini merupakan upaya membangkitkan ekonomi lokal pascapandemi. Selain itu, dirinya berharap ,keikutsertaan Pemkab Kudus kali ini dapat membuka potensi jejaring bagi UMKM lokal Kudus, agar dapat lebih dikenal oleh masyarakat. “Ini bentuk ikhtiar kita dalam menambah pangsa pasar, sekaligus penguatan ekonomi lokal pascapandemi. Selain lebih dikenal, kami juga berharap terbangunnya jaringan kerja sama meningkatkan citra produk UMKM serta potensi lokal dari Kudus,” tuturnya. Penulis: Kontributor Kab Kudus',
                'image' => $baseUrl . 'foto.jpeg',
                'status' => 'active',
            ],
            [
                'category_blog_id' => $kategoriUmkm->id,
                'author' => 'Tim Redaksi',
                'title' => 'Disperindag Kudus Dorong Pelaku UMKM Manfaatkan Platform Digital',
                'content' => 'Dinas Perdagangan (Disperindag) Kabupaten Kudus terus mendorong para pelaku UMKM untuk beradaptasi dengan teknologi. Melalui berbagai pelatihan, UMKM didorong untuk memanfaatkan platform digital dan e-commerce guna memperluas jangkauan pasar dan meningkatkan omzet penjualan di era digital.',
                'image' => $baseUrl . 'umkm_digital.jpg',
                'status' => 'active',
            ],
            [
                'category_blog_id' => $kategoriUmkm->id,
                'author' => 'Kontributor Jateng',
                'title' => 'Mengenal Jenang Kudus: Sukses Manis UMKM Lokal Tembus Pasar Ekspor',
                'content' => 'Jenang Kudus, penganan manis legit khas Kota Kretek, menjadi bukti sukses UMKM lokal. Salah satu produsen jenang legendaris berhasil mempertahankan resep tradisional sambil mengadopsi manajemen modern, sehingga produknya tidak hanya merajai pasar domestik tetapi juga berhasil menembus pasar ekspor di beberapa negara.',
                'image' => $baseUrl . 'jenang_kudus.jpg',
                'status' => 'active',
            ],
        ];

        // 3. Looping data dan menggunakan updateOrCreate
        foreach ($articles as $data) {
            ArticleBlog::updateOrCreate(
                ['title' => $data['title']], // Kunci unik (kita asumsikan judul artikel unik)
                [ // Data yang akan diisi atau diperbarui
                    'category_blog_id' => $data['category_blog_id'],
                    'author' => $data['author'],
                    'content' => $data['content'],
                    'image' => $data['image'],
                    'status' => $data['status'],
                ]
            );
        }
    }
}