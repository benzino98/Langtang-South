<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $projectId = $this->route('project')->id;

        return [
            'title' => 'required|string|max:255|unique:projects,title,' . $projectId,
            'description' => 'required|string',
            'community_ward' => 'required|string|max:255',
            'status' => 'required|in:planned,ongoing,completed',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'completion_date' => 'nullable|date',
            'is_published' => 'nullable|boolean',
        ];
    }
}
