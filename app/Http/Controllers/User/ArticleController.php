<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article; // Articleモデルを使用
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showArticle($id)
    {
        // 指定されたIDの記事を取得
        $article = Article::findOrFail($id);

        // ビューにデータを渡して表示
        return view('user.layouts.article', compact('article'));
    }
}
