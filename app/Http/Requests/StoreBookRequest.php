<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            //
            'name' => 'required',
            'short_description' => 'required',
            'price' => "required||numeric||min:0",
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Tên sach không được để trống",

            'short_description.required'=>"short_description không được để trống",
            'image.required'=>"Ảnh sach không được để trống",

            'price.required'=>"giá không được trống",
            'price.min'=>"giá không được nhỏ hơn 0",
            'price.numeric'=>"giá sản phẩm phải là số",
        ];
    }
}
