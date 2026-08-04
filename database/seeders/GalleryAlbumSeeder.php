<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GalleryAlbumSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            [
                'title' => '2026 Resettlement Day Celebration',
                'description' => 'Photos from the annual Resettlement Day festival, celebrating the history and culture of the Tarok people.',
                'cover_image' => 'gallery/album_covers/resettlement_day.jpg',
            ],
            [
                'title' => 'Commissioning of Langtang Central Market',
                'description' => 'Official commissioning ceremony of the newly constructed Langtang Central Market complex by the Executive Chairman.',
                'cover_image' => 'gallery/album_covers/market_commissioning.jpg',
            ],
            [
                'title' => 'Community Health Outreach Program',
                'description' => 'Photos from the free medical outreach and immunization campaign held at the general hospital.',
                'cover_image' => 'gallery/album_covers/health_outreach.jpg',
            ],
        ];

        foreach ($albums as $album) {
            GalleryAlbum::updateOrCreate(
                ['title' => $album['title']],
                array_merge($album, [
                    'slug' => Str::slug($album['title']),
                    'is_published' => true,
                ])
            );
        }
    }
}
