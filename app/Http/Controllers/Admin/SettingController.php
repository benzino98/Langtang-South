<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * The default settings that are editable in the admin panel.
     */
    protected array $settingDefinitions = [
        // General
        'site_name' => ['label' => 'Site Name', 'group' => 'general', 'type' => 'string'],
        'site_tagline' => ['label' => 'Site Tagline', 'group' => 'general', 'type' => 'string'],
        'site_description' => ['label' => 'Site Description', 'group' => 'general', 'type' => 'text'],
        'site_logo' => ['label' => 'Site Logo', 'group' => 'general', 'type' => 'image'],
        'site_favicon' => ['label' => 'Favicon', 'group' => 'general', 'type' => 'image'],

        // Contact
        'contact_address' => ['label' => 'Address', 'group' => 'contact', 'type' => 'string'],
        'contact_phone' => ['label' => 'Phone', 'group' => 'contact', 'type' => 'string'],
        'contact_email' => ['label' => 'Email', 'group' => 'contact', 'type' => 'string'],
        'contact_hours' => ['label' => 'Office Hours', 'group' => 'contact', 'type' => 'string'],

        // Social
        'social_facebook' => ['label' => 'Facebook URL', 'group' => 'social', 'type' => 'string'],
        'social_twitter' => ['label' => 'Twitter URL', 'group' => 'social', 'type' => 'string'],
        'social_instagram' => ['label' => 'Instagram URL', 'group' => 'social', 'type' => 'string'],
        'social_youtube' => ['label' => 'YouTube URL', 'group' => 'social', 'type' => 'string'],
        'social_linkedin' => ['label' => 'LinkedIn URL', 'group' => 'social', 'type' => 'string'],
    ];

    /**
     * Show the settings edit form.
     */
    public function edit()
    {
        $settings = Setting::all()->keyBy('key');

        return view('admin.settings.edit', [
            'settingDefinitions' => $this->settingDefinitions,
            'settings' => $settings,
        ]);
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        foreach ($this->settingDefinitions as $key => $definition) {
            $setting = Setting::firstOrNew(['key' => $key]);
            $setting->type = $definition['type'];
            $setting->group = $definition['group'];

            if ($definition['type'] === 'image') {
                if ($request->hasFile($key)) {
                    // Delete old image
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    $setting->value = app(\App\Services\ImageOptimizer::class)->store($request->file($key), 'settings');
                }
                // If no new image uploaded, keep existing value (don't overwrite)
            } else {
                $setting->value = $request->input($key);
            }

            $setting->save();
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
