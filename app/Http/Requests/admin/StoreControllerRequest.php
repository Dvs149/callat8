<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreControllerRequest extends FormRequest
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
            'name' => "required|max:50",
            'adddress' => "required",
            'city_id' => "required",
            'logo' => "image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=200,max_height=200,min_width=200,min_height=200|max:1024",
            'type' => "required",
            'open_time' => "required",
            'close_time' => "required",
            'status' => "required",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Field is required",
            'name.max' => "Field should be less then 50 characters",
            'adddress.required' => "Adddress field is required",
            'city_id.required' => "City_id field is required",
            'logo.dimensions' => "'The logo image should have 200x200 dimension.';",
            'type.required' => "Type field is required",
            'open_time.required' => "Open time field is required",
            'close_time.required' => "Close time field is required",
            'status.required' => "Status is required",
        ];
    }
}
