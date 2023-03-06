<?php

namespace App\Http\Requests\API\v2;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubmitTestimonialV2ControllerRequest extends FormRequest
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
            'user_name' => 'required',
            'message' => 'required',
            'user_id' => 'required|unique:testimonial,user_id',
        ];
    }

    public function messages()
    {
        return [
            // 'otp.required' => 'otp field is required.',
            'user_name.required' => 'User name field is required.',
            'message.required' => 'User name field is required.',
            'user_id.required' => 'User id field is required.',
            'user_id.unique' => 'You have already submitted feedback.',
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
