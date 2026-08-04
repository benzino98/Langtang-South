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
            ['key' => 'site_name', 'value' => 'Langtang South Area Council', 'type' => 'string', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'People First, Service First', 'type' => 'string', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'The official website of the Langtang South Area Council, Plateau State, Nigeria.', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => null, 'type' => 'image', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => null, 'type' => 'image', 'group' => 'general'],

            // Contact
            ['key' => 'contact_address', 'value' => 'Council Secretariat, Langtang South LGA, Plateau State', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+234 800 000 0000', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@langtangsouth.gov.ng', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_hours', 'value' => 'Mon - Fri: 8:00 AM - 4:00 PM', 'type' => 'string', 'group' => 'contact'],

            // Social
            ['key' => 'social_facebook', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_youtube', 'value' => '#', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => '#', 'type' => 'string', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
