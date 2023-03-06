<?php

namespace App\Http\Requests\API\v1;

use Illuminate\Foundation\Http\FormRequest;

class OrederAPIRequestController extends FormRequest
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
            'parcel_detail'=>'required|max:150',
            'weight'=>'required',
            'notes'=>'required|max:150',
            'sender_name'=>'required|max:20',
            'sender_email'=>'required|email|max:75',
            'sender_mobile'=>'required|max:12',
            'sender_address_1'=>'required|max:20',
            'sender_address_2'=>'required|max:20',
            'sender_address_3'=>'required|max:20',
            'sender_city'=>'required|max:15',
            'sender_longitute'=>'required|max:10',
            'sender_latitude'=>'required|max:10',
            'receiver_name'=>'required|max:20',
            'receiver_email'=>'required|email|max:75',
            'receiver_mobile'=>'required|max:12',
            'receiver_address_1'=>'required|max:20',
            'receiver_address_2'=>'required|max:20',
            'receiver_address_3'=>'required|max:20',
            'receiver_city'=>'required|max:15',
            'receiver_longitute'=>'required|max:10',
            'receiver_latitude'=>'required|max:10',
            'price'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'parcel_detail.required'=>'parcel detail is required',
            'weight.required'=>'weight is required',
            'notes.required'=>'notes is required',
            'sender_name.required'=>'sender name is required',
            'sender_email.required'=>'sender email is required',
            'sender_mobile.required'=>'sender mobile is required',
            'sender_address_1.required'=>'sender address 1 is required',
            'sender_address_2.required'=>'sender address 2 is required',
            'sender_address_3.required'=>'sender address 3 is required',
            'sender_city.required'=>'sender city is required',
            'sender_longitute.required'=>'sender longitute is required',
            'sender_latitude.required'=>'sender latitude is required',
            'receiver_name.required'=>'receiver name is required',
            'receiver_email.required'=>'receiver email is required',
            'receiver_mobile.required'=>'receiver mobile is required',
            'receiver_address_1.required'=>'receiver address 1 is required',
            'receiver_address_2.required'=>'receiver address 2 is required',
            'receiver_address_3.required'=>'receiver address 3 is required',
            'receiver_city.required'=>'receiver city is required',
            'receiver_longitute.required'=>'receiver longitute is required',
            'receiver_latitude.required'=>'receiver latitude is required',
            'price.required'=>'price is required',
        ];
    }
}
