<?php

namespace App\Http\Requests;
 
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
class StoreSaleRequest extends FormRequest
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
            'seller_name' => 'nullable|string|max:255',
            'seller_phone' => 'nullable|string|max:20',
            'title' => 'required|string|max:255',
            'store_activity' => 'required|string|max:255',
            'store_url' => 'required|url|max:255',
            'store_age' => 'required|integer|min:1',
            'monthly_revenue' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'is_currently_operating' => 'required|boolean',
            'reason_for_sale' => 'required|string',
            'notes' => 'nullable|string',
            'category' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'short_description' => 'required|string',
            'store_platform' => 'required|string|max:255',
            'store_category' => 'required|string|max:255',
            'store_language' => 'required|string|max:10',
            'target_market' => 'required|string|max:255',
            'inventory_included' => 'required|boolean',
            'is_approved' => 'boolean',
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
