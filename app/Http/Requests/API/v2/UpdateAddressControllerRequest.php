<?php

namespace App\Http\Requests\API\v2;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAddressControllerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'address' => 'required',
            'landmark' => 'required',
            'address_type' => 'required|in:Home,Work,Other',
            'address_lat' => 'required',
            'address_long' => 'required',
            'other_name' => 'required_if:address_type,==,Other'
        ];
    }
    
    public function messages()
    {
        return [
            // 'otp.required' => 'otp field is required.',
            'address.required' => 'Address field is required.',
            'landmark.required' => 'Landmark field is required.',
            'address_type.required' => 'Address type field is required.',
            'address_type.in' => 'Address type field should be home, work or other',
            'address_lat.required' => 'Address latitude field is required.',
            'address_long.required' => 'Address longitude field is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'status' => 0,
            'errors' => $errors
        
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
