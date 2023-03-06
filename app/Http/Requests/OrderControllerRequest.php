<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        // dd($this->delivery);


        return [
            'order_id' => 'nullable',
            'parcel_value' => 'nullable',
            'payment_type' => 'nullable',
            'order_type_id' => 'nullable',
            'sending_item_id' => 'nullable',
            'pickup_address' => 'nullable',
            'pickup_phone' => 'nullable',
            'pickup_date' => 'required_if:order_type,Pick up',
            'pickup_time' => 'nullable',
            'order_type' => 'required',
            'delivery.*.delivery_address' => 'required_if:order_type,Pick up',
            'delivery.*.delivery_phone' => 'required_if:order_type,Pick up',
            'delivery.*.delivery_date' => 'required_if:order_type,Pick up|date',
            'delivery.*.delivery_time' => 'required_if:order_type,Pick up',
            // 'delivery.*.delivery_time' => 'required_if:order_type,Pick up|date_format:h:i A',
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
            'delivery.*.delivery_date.after_or_equal' => 'Delivery date is less then pick up date.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $tempErrors = [];
            if ($this->order_type == 'Pick up') {

                $pick_update_time = $this->pickup_date . ' ' . $this->pickup_time;
                $delivery_0 = $this->delivery[0]['delivery_date'] . ' ' . $this->delivery[0]['delivery_time'];
                // dd($pick_update_time,$delivery_0,Carbon::parse( $pick_update_time )->floatDiffInMinutes( $delivery_0 , false));
                if (Carbon::parse($pick_update_time)->floatDiffInMinutes($delivery_0, false) < 60) {
                    $tempErrors = ['delivery_0_delivery_date' => 'Delivery time must be greater then pick up date and time.'];
                } else {
                    $prev = '';
                    foreach ($this->delivery as $key => $value) {

                        if (empty($prev)) {
                            $prev = $this->delivery[$key]['delivery_date'] . ' ' . $this->delivery[$key]['delivery_time'];
                            continue;
                        }

                        $cur = $this->delivery[$key]['delivery_date'] . ' ' . $this->delivery[$key]['delivery_time'];
                        // dump($prev,$cur,Carbon::parse($cur)->floatDiffInMinutes( $prev , false)>= 60);

                        if (Carbon::parse($prev)->floatDiffInMinutes($cur, false) >= 60) {
                            $prev = $cur;
                        } else {
                            $tempErrors = ['delivery_0_delivery_date' => 'Delivery time must have one hour difference'];
                            break;
                        }
                    }
                }

                // dd($tempErrors);
                if (!empty($tempErrors)) {
                    foreach ($tempErrors as $key => $value) {
                        $validator->errors()->add($key, $value);
                    }
                }
            }
        });
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        // dd($errors);
        $tempErrors = [];

        /* $prev = '';

        
        foreach ($this->delivery as $key => $value) {
            // exit;
            if( empty($prev) ) {
                $prev = $this->delivery[$key]['delivery_time'];
                continue;
            }
            
            $cur = $this->delivery[$key]['delivery_time'];
            // dump($prev,$cur,Carbon::parse($cur)->floatDiffInMinutes( $prev , false) >= 60);
            
            if(Carbon::parse( $prev )->floatDiffInMinutes( $cur , false) >= 60){
                $prev = $cur;
            } else {
                $tempErrors = ['delivery_0_delivery_time' => ['Delivery time must have one hour difference']];
                break;
            }
        
        } */

        /* if( !empty($errors) ) {
            foreach ($errors as $key => $value) {
                if( strpos($key, 'delivery.0.delivery_time') !== false ) {
                    $tempErrors = ['delivery_0_delivery_time' => ['Delivery time must be greater then pick up time']];
                    break;
                }
            }
        } */

        /* if( !empty($errors) ) {
            foreach ($errors as $key => $value) {
                if( strpos($key, 'delivery_date') !== false ) {
                    $tempErrors = ['delivery_0_delivery_date' => [$value[0]]];
                    break;
                }
            }
        } */

        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'errors' => !empty($tempErrors) ? $tempErrors : $errors,
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
