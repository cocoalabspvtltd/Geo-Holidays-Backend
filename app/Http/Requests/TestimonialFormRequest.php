<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TestimonialFormRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return $this->store();
                case 'PUT':
                    return $this->update();
            default:
                return [];
        }
    }

     /**
     * Validate the store request
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    protected function store(): array
    {
         // make all of the fields required, set info file to accept only files
         return [
            'title' => 'required|string|min:3|max:255', // minimum length is 3 characters, maximum length is 255 characters
            'sub_title' => 'required|string|min:3|max:255', // minimum length is 3 characters, maximum length is 255 characters
            'description' => 'required|string|max:2000', // minimum length is 3 characters, maximum length is 255 character
        ];
    }

    /**
     * Get the validation rules
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    private function update(): array
    {
         // make all of the fields required, set info file to accept only files
         return [
            'title' => 'required|string|min:3|max:255', // minimum length is 3 characters, maximum length is 255 characters
            'sub_title' => 'required|string|min:3|max:255', // minimum length is 3 characters, maximum length is 255 characters
            'description' => 'nullable|string|max:2000', // minimum length is 3 characters, maximum length is 255 characters
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
