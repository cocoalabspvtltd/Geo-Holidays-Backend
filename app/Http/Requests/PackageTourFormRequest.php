<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageTourFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // make all of the fields required, set info file to accept only files
        return [
            'title' => 'required|string|min:3|max:255', // minimum length is 3 characters, maximum length is 255 characters
            'image' => 'nullable|file|max:1024|mimes:jpg,png,svg',
            'description' => 'required',
            'package_rate' => 'required',
            'day_count' => 'required',
            'night_count' => 'required',
            'highlights' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'category' => 'required'

        ];
    }
}
