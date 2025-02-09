<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreInterestedRequest extends FormRequest
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
        return [
            'listing_id' => 'required|uuid',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:interested_buyers,email',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();
        $firstErrorKey = $errors->keys()[0]; // Get the first error key
        $firstErrorMessage = $errors->first(); // Get the first error message

        throw new HttpResponseException(response()->json([
            'code' => 0,
            'message' => $firstErrorMessage, // Return only the first error message
            'field' => $firstErrorKey, // Include the field name
        ], 422));
    }
}
