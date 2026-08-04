<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Monthly Council Meeting',
                'description' => 'Ordinary meeting of the Langtang Local Government Legislative and Executive Council to deliberate on local matters.',
                'event_date' => now()->addDays(5)->toDateString(),
                'venue' => 'Council Secretariat Hall',
                'is_published' => true,
            ],
            [
                'title' => 'Community Health Outreach',
                'description' => 'Free medical consultation, immunizations, and basic health checkups for all community members.',
                'event_date' => now()->addDays(12)->toDateString(),
                'venue' => 'Langtang General Hospital',
                'is_published' => true,
            ],
            [
                'title' => 'Farmers Empowerment Forum',
                'description' => 'Distribution of subsidized agricultural inputs and training on modern farming techniques for the planting season.',
                'event_date' => now()->addDays(20)->toDateString(),
                'venue' => 'Langtang Town Hall',
                'is_published' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(
                ['title' => $event['title']],
                $event
            );
        }
    }
}
