<?php

namespace App\Http\Requests\API\v2;

use App\dgmodel\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginV2ControllerRequest extends FormRequest
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
            // 'otp' => 'required',
            'mobile_number' => 'required|not_exists:customer,sender_mobile|digits:10',
            'device_id' => 'required',
            'fcm_key' => 'required',
            'device_type' => 'required',
            'device_version' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'otp.required' => 'otp field is required.',
            'mobile_number.required' => 'Mobile number field is required.',
            'device_id.required' => 'Device id field is required.',
            'fcm_key.required' => 'Fcm key field is required.',
            'device_type.required' => 'Device type field is required.',
            'device_version.required' => 'Device version field is required.',
            'mobile_number.not_exists' => 'Mobile number not found.',
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

    /* public function withValidator($validator)
    {
        
        // before making changes
        $validator->after(function ($validator) {
            $customer = Customer::where('sender_mobile',$this->mobile_number)->first();
            
            if ( empty($customer)) {
                $validator->errors()->add('sender_mobile', 'mobile details incorrect.');
            } 
            
        });
        return;
    } */
}
