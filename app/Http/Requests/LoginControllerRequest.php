<?php

namespace App\Http\Requests;

use App\dgmodel\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginControllerRequest extends FormRequest
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
            'password' => 'required',
            'mobile_number' => 'required|digits:10',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password field is required.',
            'mobile_number.required' => 'Mobile number field is required.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $errors = (new ValidationException($validator))->errors();
        
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'status' => 0,
            'errors' => $errors
        // ], 200));
    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    public function withValidator($validator)
    {
        // checks user current password
        // before making changes
        $validator->after(function ($validator) {
            $customer = Customer::where('sender_mobile',$this->mobile_number)->first();
            
            if ( empty($customer) || !Hash::check($this->password, $customer->password) ) {
                $validator->errors()->add('password', 'mobile or password details incorrect.');
            } 
            
        });
        return;
    }
}
