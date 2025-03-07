<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'profile_image' => 'nullable|image|mimes:jpeg|max:2048',
            'name' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255|regex:/^[ァ-ンヴー]*$/u',
            'email' => 'required|string|email|max:255',
        ];
    
        if ($this->input('new_password')) {
            $rules['current_password'] = 'required|string|min:8|current_password';
            $rules['new_password'] = 'required|string|min:8|confirmed';
        }
    
        return $rules;
    }
    
    public function messages()
    {
        return [
            'profile_image.mimes' => '指定のファイル形式ではありません。',
            'name.required' => '入力必須項目です。',
            'name_kana.required' => '入力必須項目です。',
            'name_kana.regex' => 'カタカナで入力してください。',
            'email.required' => '入力必須項目です。',
            'email.email' => 'メールアドレスを入力してください。',
            'current_password.required' => '入力必須項目です。',
            'current_password.min' => '8文字以上で入力してください。',
            'current_password.current_password' => 'パスワードが異なります。',
            'new_password.required' => '入力必須項目です。',
            'new_password.min' => '8文字以上で入力してください。',
            'new_password.confirmed' => 'パスワードが一致しません。',
        ];
    }
}
