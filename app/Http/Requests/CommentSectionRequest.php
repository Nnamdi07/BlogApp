<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentSectionRequest extends FormRequest
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
            'blog_post_id' => 'required|integer|exits:blog_post,id',
            'name' => 'required|string'
        ];
    }
}
