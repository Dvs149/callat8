<?php

namespace App\Http\Requests\API\v1\customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;

class AddRatingDriverControllerRequest extends FormRequest
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
            'user_id' => 'required',
            'driver_id' => 'required',
            'double_google_order_id' => 'required', 
            'rating' => 'required',
            'comments' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'user id field is required.',
            'driver_id.required' => 'driver id field is required.',
            'double_google_order_id.required' => 'order id field is required.',
            'rating.required' => 'rating field is required.',
            'comments.required' => 'comments field is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
