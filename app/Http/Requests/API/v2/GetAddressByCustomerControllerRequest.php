<?php

namespace App\Http\Requests\API\v2;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetAddressByCustomerControllerRequest extends FormRequest
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
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'User id is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'status' => 0,
            'errors' => $errors
            // ], 200));
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
