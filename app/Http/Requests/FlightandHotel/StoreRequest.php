<?php

namespace App\Http\Requests\FlightandHotel;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'details' => 'required|string',
            'image' => 'required|file|max:1024|mimes:jpg,png,svg', // optional, file only, max size is 1024 KB, with some allowed mime types
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
            'details' => 'required|string',
            'image' => 'sometimes|file|max:1024|mimes:jpg,png,svg', // optional, file only, max size is 1024 KB, with some allowed mime types
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
