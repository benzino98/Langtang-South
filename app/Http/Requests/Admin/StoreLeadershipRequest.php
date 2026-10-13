<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLeadershipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|in:Executive Chairman,Vice Chairman,Council Secretary,Supervisory Councillor',
            'portfolio' => 'nullable|string|max:255',
            'biography' => 'nullable|string',
            'welcome_message' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'sort_order' => 'required|integer|min:0',
        ];
    }
}
