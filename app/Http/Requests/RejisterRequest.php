<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RejisterRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => 'required|email|min:8|max:191|unique:users',
            'password' => 'required|min:8|max:191',
            'confirm_password' => 'required|same:user_password', 
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'名前を入力して下さい',
            'name.string' => '文字で入力して下さい',
            'name.max' => '191文字以内で入力して下さい',
            'email.required' => 'メールアドレスを入力して下さい',
            'email.email' => 'メール形式で入力して下さい',
            'email min' => '8文字以上で入力して下さい',
            'email. max' => '191文字以内で入力して下さい',
            'email.email' => '有効なメールアドレス形式で入力して下さい',
            'email.unique' => '指定されたメールアドレスは既に使用されています',
            'password.required' => 'パスワードを入力して下さい',
            'password.min' => '8文字以上で入力して下さい',
            'password.max' => '191文字以上で入力して下さい',
            'confirm_password' => 'パスワードが一致しません',
            'confirm_password' => '指定されたメールアドレスは既に使用されています'

        ];
    }
}
