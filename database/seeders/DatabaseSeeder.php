<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            NewsCategorySeeder::class,
            NewsArticleSeeder::class,
            EventSeeder::class,
            PublicNoticeSeeder::class,
            DepartmentSeeder::class,
            LeadershipSeeder::class,
            ProjectSeeder::class,
            GalleryAlbumSeeder::class,
            GalleryImageSeeder::class,
            DocumentCategorySeeder::class,
            DocumentSeeder::class,
        ]);
    }
}
