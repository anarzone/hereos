<?php

namespace App\Http\Requests\V2\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StorePostRequest extends FormRequest
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
        $required = $this->request->get('post_id') ? 'sometimes' : 'required';
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'meta_title' => 'required|string|between:2,135',
            'meta_description' => 'required|string|between:2,155',
            'meta_keywords' => 'required|string',
            'slug' => 'required|string|unique:posts,id,'.$this->request->get('post_id'),
            'cover' => "$required|image|mimes:jpg,jpeg,png",
            'thumbnail_image' => "$required|image|mimes:jpg,jpeg,png",
            'carousel_banner_image' => "$required|image|mimes:jpg,jpeg,png",
            'carousel_small_image' => "$required|image|mimes:jpg,jpeg,png",
            'status' => 'required',
            'format' => 'required',
            'category_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Tələb olunan sahə.',
            'string' => 'Format yalnız text(string) ola bilər.',
            'unique' => 'Artıq istifadə edilib.',
            'image' => 'Şəkil formatında olmalıdır.',
            'mimes' => 'Şəkil formatı yalnışdır (jpeg, jpg, png olmalıdır)',
        ];
    }
}
