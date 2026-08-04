<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Rehabilitation of Langtang-Shendam Road',
                'description' => 'Comprehensive asphalt overlay, culvert expansion, and erosion control measures on the major arterial road connecting Langtang to the Shendam local government area.',
                'community_ward' => 'Multiple Wards',
                'status' => 'ongoing',
                'completion_date' => now()->addMonths(6)->toDateString(),
            ],
            [
                'title' => 'Construction of Modern Market Stalls',
                'description' => 'Construction of 200 lock-up shops, a police post, and a public toilet at the Langtang Central Market to boost commercial activities and local revenue.',
                'community_ward' => 'Langtang Central',
                'status' => 'completed',
                'completion_date' => now()->subMonths(3)->toDateString(),
            ],
            [
                'title' => 'Drilling of Motorized Boreholes in 10 Wards',
                'description' => 'Provision of clean, potable water to 10 communities by drilling and installing solar-powered motorized boreholes to reduce water-borne diseases.',
                'community_ward' => 'Various',
                'status' => 'ongoing',
                'completion_date' => now()->addMonths(2)->toDateString(),
            ],
            [
                'title' => 'Langtang South Scholarship Scheme',
                'description' => 'Payment of tuition fees for 500 tertiary students from Langtang who are enrolled in science, technology, engineering, and medical courses.',
                'community_ward' => 'All Wards',
                'status' => 'completed',
                'completion_date' => now()->subMonths(1)->toDateString(),
            ],
            [
                'title' => 'Primary School Furniture Provision',
                'description' => 'Provision of 2,000 sets of desks, chairs, and teachers\' tables to 20 primary schools across the local government area.',
                'community_ward' => 'All Wards',
                'status' => 'planned',
                'completion_date' => now()->addMonths(4)->toDateString(),
            ]
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                array_merge($project, [
                    'slug' => Str::slug($project['title']),
                    'is_published' => true,
                ])
            );
        }
    }
}
