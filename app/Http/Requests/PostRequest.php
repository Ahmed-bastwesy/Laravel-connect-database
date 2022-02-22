<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            // validate data from user
            'title' => 'required|unique:posts|max:255|min:3',
            'description' => 'required|min:15',
            'user_id' => 'required|exists:users,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'A title must be more than two character',
            'description.required' => 'A description is required',
            'description.min' => 'A description must be more than 15 character',
        ];
    }
}
