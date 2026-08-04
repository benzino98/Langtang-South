<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        if (!$admin) {
            return;
        }

        $categories = NewsCategory::all();

        $articles = [
            [
                'title' => 'Council Approves New Community Development Plan',
                'summary' => 'The Council has approved a comprehensive development plan aimed at improving infrastructure across all wards in the Langtang local government area.',
                'body' => 'Today, the Langtang Local Government Council officially approved the Langtang South Development Agenda. This plan includes immediate road rehabilitations, healthcare center upgrades, and clean water access projects across several wards. The Executive Chairman emphasized that this aligns with the administration\'s promise to deliver direct governance benefits to the people.',
                'category_name' => 'Council News',
            ],
            [
                'title' => 'Executive Chairman Commences Ward Tour',
                'summary' => 'The Executive Chairman has kicked off an assessment and listening tour of all wards in Langtang to engage directly with community members.',
                'body' => 'The Executive Chairman of Langtang Local Government Council has commenced a comprehensive tour of all administrative wards. The tour aims to assess ongoing projects, inspect community healthcare centers, and sit down with community elders, youth groups, and women associations to prioritize local needs in the upcoming budget.',
                'category_name' => 'Chairman Activities',
            ],
            [
                'title' => 'Commissioning of the New Primary Health Care Clinic',
                'summary' => 'A state-of-the-art Primary Health Care clinic has been commissioned to improve healthcare delivery in Langtang communities.',
                'body' => 'Residents celebrated the official commissioning of the upgraded Primary Health Care Clinic. The facility is equipped with modern medical tools, a maternal ward, and an essential drug store, resolving historical travel challenges for basic healthcare needs.',
                'category_name' => 'Projects',
            ]
        ];

        foreach ($articles as $index => $articleData) {
            $category = $categories->where('name', $articleData['category_name'])->first();
            if (!$category) {
                continue;
            }

            NewsArticle::updateOrCreate(
                ['title' => $articleData['title']],
                [
                    'slug' => Str::slug($articleData['title']),
                    'summary' => $articleData['summary'],
                    'body' => $articleData['body'],
                    'news_category_id' => $category->id,
                    'user_id' => $admin->id,
                    'is_published' => true,
                    'published_at' => now()->subDays($index),
                ]
            );
        }
    }
}
