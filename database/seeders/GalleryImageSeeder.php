<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    public function run(): void
    {
        $albums = GalleryAlbum::all();

        if ($albums->isEmpty()) {
            return;
        }

        $images = [
            '2026 Resettlement Day Celebration' => [
                ['path' => 'gallery/resettlement_day/1.jpg', 'caption' => 'Tarok dancers in vibrant traditional attire.'],
                ['path' => 'gallery/resettlement_day/2.jpg', 'caption' => 'The Executive Chairman addressing the crowd.'],
                ['path' => 'gallery/resettlement_day/3.jpg', 'caption' => 'Community members celebrating the festival.'],
                ['path' => 'gallery/resettlement_day/4.jpg', 'caption' => 'Cultural parade showcasing local heritage.'],
            ],
            'Commissioning of Langtang Central Market' => [
                ['path' => 'gallery/market_commissioning/1.jpg', 'caption' => 'The Chairman cutting the ribbon to open the new market.'],
                ['path' => 'gallery/market_commissioning/2.jpg', 'caption' => 'Front view of the newly constructed market stalls.'],
                ['path' => 'gallery/market_commissioning/3.jpg', 'caption' => 'Dignitaries and community leaders at the event.'],
            ],
            'Community Health Outreach Program' => [
                ['path' => 'gallery/health_outreach/1.jpg', 'caption' => 'A nurse administering a vaccine to a child.'],
                ['path' => 'gallery/health_outreach/2.jpg', 'caption' => 'Free medical consultations in progress.'],
                ['path' => 'gallery/health_outreach/3.jpg', 'caption' => 'Community members waiting to be attended to.'],
            ],
        ];

        foreach ($images as $albumTitle => $albumImages) {
            $album = $albums->where('title', $albumTitle)->first();
            if ($album) {
                foreach ($albumImages as $index => $image) {
                    GalleryImage::updateOrCreate(
                        [
                            'gallery_album_id' => $album->id,
                            'image_path' => $image['path'],
                        ],
                        [
                            'caption' => $image['caption'],
                            'sort_order' => $index + 1,
                        ]
                    );
                }
            }
        }
    }
}
