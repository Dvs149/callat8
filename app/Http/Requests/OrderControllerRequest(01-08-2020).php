<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class OrderControllerRequest extends FormRequest
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
            'order_id' => 'nullable',
            'parcel_value' => 'nullable',
            'payment_type' => 'nullable',
            'order_type_id' => 'nullable',
            'sending_item_id' => 'nullable',
            'pickup_address' => 'nullable',
            'pickup_phone' => 'required',
            'pickup_date' => 'required|date|date_format:Y-m-d|before_or_equal:delivery.*.delivery_phone',
            'pickup_time' => 'nullable',
            'delivery.*.delivery_address' => 'required',
            'delivery.*.delivery_phone' => 'required',
            'delivery.*.delivery_date' => 'required|date|after_or_equal:pickup_date|date_format:Y-m-d',
            'delivery.*.delivery_time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'order_id.required' => 'Order id field is required.',
            'parcel_value.required' => 'Parcel value field is required.',
            'payment_type.required' => 'Payment type field is required.',
            'order_type_id.required' => 'Order type field is required.',
            'sending_item_id.required' => 'Sending item field is required.',
            'pickup_address.required' => 'Pickup address field is required.',
            'pickup_phone.required' => 'Pickup phone field is required.',
            'pickup_date.required' => 'Pickup date field is required.',
            'pickup_time.required' => 'Pickup time field is required.',
            'delivery.*.delivery_address.required' => 'Delivery address field is required.',
            'delivery.*.delivery_phone.required' => 'Delivery phone field is required.',
            'delivery.*.delivery_date.required' => 'Delivery date field is required.',
            'delivery.*.delivery_time.required' => 'Delivery time field is required.',
            'delivery.*.delivery_date.after_or_equal' => 'Delivery date field is required.',
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
