<?php

namespace App\Http\Requests\API\v1\driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class SubmitDriverLocationControllerRequest extends FormRequest
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
            'order_id' => 'required',
            'driver_lat' => 'required',
            'driver_long' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'driver_id.required' => 'driver id field is required.',
            'order_id.required' => 'name field is required.',
            'driver_lat.required' => 'driver latitude field is required.',
            'driver_long.required' => 'driver longitude field is required.',
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
