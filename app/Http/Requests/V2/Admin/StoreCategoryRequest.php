<?php

namespace App\Http\Requests\V2\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories,id,'.$this->request->get('category_id'),
            'cover' => 'sometimes|image|mimes:jpg,jpeg,png',
            'color_hex' => 'required|string',
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
