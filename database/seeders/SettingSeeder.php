<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Seed the application's default settings.
     */
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Langtang South Local Government Council', 'type' => 'string', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Peace, Unity, and Grassroots Development', 'type' => 'string', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'Langtang South Local Government Council is committed to promoting grassroots development, improving basic infrastructure and public services, strengthening peace and unity, and creating opportunities that enhance the wellbeing of its people.', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => null, 'type' => 'image', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => null, 'type' => 'image', 'group' => 'general'],

            // Contact
            ['key' => 'contact_address', 'value' => 'MABUDI-DADIN-KOWA ROAD, Opposite the INEC Office, Zamko Road, Mabudi.', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_postal', 'value' => '941107', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '07084219704', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'langtangsouthlgc@gmail.com', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_hours', 'value' => 'Mon - Fri: 8:00 AM - 4:00 PM', 'type' => 'string', 'group' => 'contact'],

            // Social
            ['key' => 'social_facebook', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_youtube', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => '#', 'type' => 'string', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
