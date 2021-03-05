<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            //'article_type_id' => 'required',
            // 'category_id' => 'numeric',
            'post_status' => 'required|numeric',
            'post_thumbnail' => 'required',
            'post_slug' => [
                'required',
                Rule::unique('posts')->ignore($this->post)
            ],
            'post_title' => 'required',
            'post_description' => 'required',
            'post_content' => 'required'
        ];
    }
}
