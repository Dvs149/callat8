<?php

namespace App\Http\Requests;

use App\dgmodel\Customer;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\ForgotPasswordControllerRequest;


class ForgotPasswordControllerRequest extends FormRequest
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
            // 'mobile_number' => 'required|'.Rule::exists('customer')->whereNot('sender_mobile', $this->mobile_number),
            'mobile_number' => 'required|not_exists:customer,sender_mobile|digits:10',
        ];
    }

    public function messages()
    {
        return [
            'mobile_number.required' => 'Mobile number field is required.',
            'mobile_number.not_exists' => 'Mobile number not found.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $errors = (new ValidationException($validator))->errors();
        
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    /* public function withValidator($validator)
    {
        // checks user current password
        // before making changes
        $validator->after(function ($validator) {

            $customer = Customer::where('sender_mobile',$this->mobile_number)->first();
            // dd($customer);
            if ( empty($customer) ) {
                $validator->errors()->add('mobile_number', 'mobile number invalid.');
            }
            
        });
        return;
    } */
}
