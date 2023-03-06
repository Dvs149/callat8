<?php

namespace App\Http\Requests\API\v2;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterV2ControllerRequest extends FormRequest
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
            // 'user_id' => 'required',
            // 'email' => 'required|email|max:75',
            'mobile_number' => 'required|max:10|unique:customer,sender_mobile',
            'name' => 'required',
            'device_id' => 'required',
            'fcm_key' => 'required',
            'device_type' => 'required',
            'device_version' => 'required',
        ];

    }

    public function messages()
    {
        return [
            // 'email.required' => 'Email field is required.',
            'mobile_number.required' => 'Mobile number field is required.',
            'name.required' => 'Name field is required.',
            'device_id.required' => 'Device id field is required.',
            'fcm_key.required' => 'Fcm key field is required.',
            'device_type.required' => 'Device type field is required.',
            'device_version.required' => 'Device version field is required.',
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
