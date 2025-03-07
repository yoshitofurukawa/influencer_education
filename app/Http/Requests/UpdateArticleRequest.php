<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'posted_date' => 'required|date',
            'title' => 'required|max:255',
            'article_contents' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'posted_date.required' => '投稿日時は必須です。',
            'posted_date.date' => '投稿日時は有効な日付である必要があります。',
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'article_contents.required' => '本文は必須です。',
        ];
    }
}
