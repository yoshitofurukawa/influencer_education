<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'current_password.required' => '現在のパスワードを入力してください。',
            'current_password.min' => '現在のパスワードは8文字以上である必要があります。',
            'current_password.string' => '現在のパスワードが異なります。',
            'new_password.required' => '新しいパスワードを入力してください。',
            'new_password.min' => '新しいパスワードは8文字以上である必要があります。',
            'new_password.confirmed' => '新しいパスワードが確認用パスワードと一致しません。',
        ];
    }
}
