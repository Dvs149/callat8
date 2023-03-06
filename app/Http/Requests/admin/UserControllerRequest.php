<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UserControllerRequest extends FormRequest
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
            'name' => "required",
            'email' => "required|email",
            'mobile' => "required|digits:10",
            // 'whatsapp_mobile' => "required|digits:10",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Field is required",
            'email.required' => "Field is required",
            'mobile.required' => "Field is required",
            // 'whatsapp_mobile.required' => "Field is required",
            // 'name.max' => "Field should be less then 50 characters",
        ];
    }
}
