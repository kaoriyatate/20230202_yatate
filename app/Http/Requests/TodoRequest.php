<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => 'required|max:20',
            'tag_id' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'content.required' => 'タスク名を入力してください',
            'content.max' => '20文字以内で入力してください',
            'tag_id.required' => 'タグを選んでください',
        ];

    }
}
