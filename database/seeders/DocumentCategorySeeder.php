<?php

namespace Database\Seeders;

use App\Models\DocumentCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DocumentCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Budgets',
            'Forms',
            'Gazettes',
            'Reports',
            'Tenders',
        ];

        foreach ($categories as $category) {
            DocumentCategory::updateOrCreate(
                ['name' => $category],
                ['slug' => Str::slug($category)]
            );
        }
    }
}
