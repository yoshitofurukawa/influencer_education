<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 必要に応じて権限チェックを追加
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'content.required' => '内容は必須です。',
        ];
    }
}
