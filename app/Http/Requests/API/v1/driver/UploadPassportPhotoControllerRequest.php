<?php

namespace App\Http\Requests\API\v1\driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class UploadPassportPhotoControllerRequest extends FormRequest
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
            'passport_photo' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }

    public function messages()
    {
        return [
            'driver_id.required' => 'driver id field is required.',
            'passport_photo.required' => 'passport_photo field is required.',
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
