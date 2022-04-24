<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được quá 255 ký tự',
            'slug.required' => 'Slug sản phẩm không được quá 255 ký tự',
            'slug.max' => 'Slug sản phẩm không được quá 255 ký tự',
            'image.required' => 'Hình ảnh không được trống',
            'price.required' => 'Giá không được để trống',
            'category.required' => 'Loại sản phẩm không được để trống',
            'description.required' => 'Mô tả không được để trống',
        ];
    }
}