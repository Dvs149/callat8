<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerControllerRequest extends FormRequest
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
        // dd()
        // $banner_image_validation = 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=800,max_height=900,min_width=800,min_height=900|max:1024';
        $banner_image_validation = 'image|mimes:jpeg,png,jpg,gif,svg|max:1024';
        if( $this->type == 'slider' ) {
            $banner_image_validation = 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=720,max_height=1200,min_width=720,min_height=1200|max:1024';
        } else if( $this->type == 'restaurant' || $this->type == 'groceries' || $this->type == 'vegetable' ){
            $banner_image_validation = 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=1600,max_height=900,min_width=1600,min_height=900|max:1024';
        }

        return [
            // 'bnr_title' => "required|max:255",
            'bnr_status'=>"required",
            'type'=>"required",
            'bnr_image' => $banner_image_validation,
        ];
    }
    public function messages()
    {
        $banner_image_validation_message = 'The banner image should have 355x238 dimension.';
        if( $this->type == 'slider' ) {
            $banner_image_validation_message = 'The banner image should have 720x1200 dimension.';
        } else if( $this->type == 'restaurant' || $this->type == 'groceries' || $this->type == 'vegetable' ) {
            $banner_image_validation_message = 'The banner image should have 1600x900 dimension.';
        }

        return [
            'bnr_title.required' => 'Banner title field is required.',
            'bnr_status.required' => 'banner status field is required.',
            'type.required' => 'Type field is required.',
            'bnr_image.dimensions' => $banner_image_validation_message,
        ];
    }

}
