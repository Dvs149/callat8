<?php

namespace App\Http\Requests\API\v2;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class DriverOrderStatusV2RequestController extends FormRequest
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
            'order_id' => 'required',
            'order_status' => 'required',
            'pickup_location_photo' => 'required_if:order_status,==,Out for delivery|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'pickup_material_photo' => 'required_if:order_status,==,Out for delivery|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'pickup_challan_photo' => 'required_if:order_status,==,Out for delivery|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'delivered_location_photo' => 'required_if:order_status,==,Delivered|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'delivered_material_photo' => 'required_if:order_status,==,Delivered|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'delivered_challan_photo' => 'required_if:order_status,==,Delivered|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
        
    }
    public function messages()
    {
        return [
            'order_id.required' => 'Order id is required.',
            'order_status' => 'Order status is required',
            'pickup_location_photo.required_if' => 'Pickup location  is required',
            'pickup_material_photo.required_if' => 'Pickup material  is required',
            'pickup_challan_photo.required_if' => 'Pickup challan  is required',
            'delivered_location_photo.required_if' => 'Delivered location  is required',
            'delivered_material_photo.required_if' => 'Delivered material  is required',
            'delivered_challan_photo.required_if' => 'Delivered challan  is required',
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
