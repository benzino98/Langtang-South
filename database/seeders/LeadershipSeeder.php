<?php

namespace Database\Seeders;

use App\Models\Leadership;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LeadershipSeeder extends Seeder
{
    public function run(): void
    {
        $leaders = [
            [
                'full_name' => 'Hon. Nanpon Danjuma',
                'title' => 'Executive Chairman',
                'portfolio' => null,
                'biography' => 'Hon. Nanpon Danjuma is a dedicated public servant with over 15 years of experience in local community development and public policy. Born and raised in Langtang, he holds a degree in Public Administration and has consistently advocated for transparent leadership and infrastructural development in Plateau State.',
                'welcome_message' => 'Welcome to the official digital portal of Langtang Local Government Council. We are committed to rendering transparent, accountable service to our citizens and providing visitors with direct information about our initiatives, history, and development.',
                'sort_order' => 1,
            ],
            [
                'full_name' => 'Hon. Sarah Timloh',
                'title' => 'Vice Chairman',
                'portfolio' => null,
                'biography' => 'Hon. Sarah Timloh is a passionate community organizer, educator, and advocate for women and youth empowerment. She brings valuable grassroot mobilization expertise to the council administrative leadership.',
                'welcome_message' => null,
                'sort_order' => 2,
            ],
            [
                'full_name' => 'Bar. Selbol Shittu',
                'title' => 'Council Secretary',
                'portfolio' => null,
                'biography' => 'Bar. Selbol Shittu is a seasoned legal practitioner and administrative professional. He oversees the council secretariat staff and ensures all administrative policies align with legislative standards.',
                'welcome_message' => null,
                'sort_order' => 3,
            ],
            [
                'full_name' => 'Hon. Ponfa Nimron',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Supervisory Councillor for Works',
                'biography' => 'Hon. Ponfa Nimron supervises the implementation of engineering, road network, and architectural projects across all council wards.',
                'welcome_message' => null,
                'sort_order' => 4,
            ],
            [
                'full_name' => 'Hon. Mary Lohnan',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Supervisory Councillor for Health',
                'biography' => 'Hon. Mary Lohnan oversees health policies, community clinic standards, and vaccination campaigns in cooperation with the primary healthcare board.',
                'welcome_message' => null,
                'sort_order' => 5,
            ],
            [
                'full_name' => 'Hon. Joshua Nimyel',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Supervisory Councillor for Agriculture',
                'biography' => 'Hon. Joshua Nimyel oversees the council agricultural support programs, seed distributions, and tractor hiring services.',
                'welcome_message' => null,
                'sort_order' => 6,
            ],
        ];

        foreach ($leaders as $leader) {
            Leadership::updateOrCreate(
                ['full_name' => $leader['full_name']],
                array_merge($leader, [
                    'slug' => Str::slug($leader['full_name']),
                    'is_active' => true,
                ])
            );
        }
    }
}
