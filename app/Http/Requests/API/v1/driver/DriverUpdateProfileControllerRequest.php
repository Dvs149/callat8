<?php

namespace App\Http\Requests\API\v1\driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class DriverUpdateProfileControllerRequest extends FormRequest
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
            'driver_id' => 'required',
            'name' => 'required',
            'address1' => 'required',
            'email'=> 'required|email|max:75',
            'postcode' => 'required|digits:6',
            // 'passport_photo' => "nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=450,max_height=600,min_width=450,min_height=600|max:1024",
        ];
    }

    public function messages()
    {
        return [
            'driver_id.required' => 'driver id field is required.',
            'name.required' => 'name field is required.',
            'address1.required' => 'address1 field is required.',
            'email.required' => 'email field is required.',
            'postcode.required' => 'postcode field is required.',
            // 'passport_photo.required' => 'passport_photo field is required.',
            // 'passport_photo.dimensions' => 'Invalid image dimension, require (450x600) pixel.',
        ];
    }
    
    protected function failedValidation(Validator $validator) {
        $errors = (new ValidationException($validator))->errors();
        
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
