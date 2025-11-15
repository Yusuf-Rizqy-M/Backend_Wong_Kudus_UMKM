<?php

namespace Database\Seeders;

use App\Models\ArticleBlog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            KecamatanSeeder::class,
            RatingSeeder::class,
            UmkmSeeder::class,
            UmkmLocationSeeder::class,
            UmkmContactSeeder::class,
            UmkmMenuSeeder::class,
            UmkmGallerySeeder::class,
            UmkmListingSeeder::class,
            UmkmOpeningHoursSeeder::class,
            CategoryBlogSeeder::class,
            ArticleBlogSeeder::class,
        ]);
    }
}

