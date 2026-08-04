<?php

namespace Database\Seeders;

use App\Models\PublicNotice;
use Illuminate\Database\Seeder;

class PublicNoticeSeeder extends Seeder
{
    public function run(): void
    {
        $notices = [
            [
                'title' => 'Public Holiday Notice: Assumption Day Celebration',
                'description' => 'The general public is hereby notified that Friday, 15th August 2026 has been declared a public holiday. Consequently, all Council offices will be closed. Normal services will resume on Monday, 18th August 2026.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Polio Immunization Campaign Commences next Monday',
                'description' => 'A local government-wide polio immunization campaign for children aged 0-5 years will commence on Monday. Parents are encouraged to bring their wards to the nearest health centers.',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($notices as $notice) {
            PublicNotice::updateOrCreate(
                ['title' => $notice['title']],
                $notice
            );
        }
    }
}
