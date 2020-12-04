<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorePost extends FormRequest
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
        $slugExist = false;
        if((array_key_exists(2, Request::segments()) && Request::segments()[2] != $this->slug) || !array_key_exists(2, Request::segments())){
            $slugExist = true;
        }
        return [
            'title' => 'required|string|min:2',
            'body'  => 'required|min:10',
            'seo_title' => 'required|string|between:2,135',
            'seo_description' => 'required|string|min:5|max:155',
            'seo_keywords' => 'required|string|min:2',
            'slug' => $slugExist ? "required|string|min:2|unique:posts": "",
            'status' => 'required|numeric',
            'cover_image' => 'file|nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cat_id' => 'required|numeric',
            'thumbnail_image' => 'file|nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048'
        ];
    }

    public function messages()
    {
        $messages = [
            'required'  => ':attribute vacib sahədir',
            'min'       => ':attribute ən az :min xarakter olmalıdır',
            'between'   => ':attribute xarakter sayı :min ve :max arasında olmalıdır',
            'unique'    => ':attribute artıq tutulub',
            'images'    => ':attribute doğru formatda deyil',
            'max'       => ':attribute en cox :max olçüdə olmalıdır',
        ];

        return $messages;
    }
}
