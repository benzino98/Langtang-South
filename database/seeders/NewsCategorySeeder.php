<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Chairman Activities',
            'Council News',
            'Public Notices',
            'Projects',
            'Community Events',
        ];

        foreach ($categories as $category) {
            NewsCategory::updateOrCreate(
                ['name' => $category],
                ['slug' => Str::slug($category)]
            );
        }
    }
}
