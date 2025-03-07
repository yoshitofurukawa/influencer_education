<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    // お知らせ一覧を表示
    public function showArticleList()
    {
        $articles = Article::all();
        return view('admin.layouts.article_list', compact('articles'));
    }

    // お知らせの編集を表示
    public function showArticleEdit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.layouts.article_edit', compact('article'));
    }

    // お知らせの作成フォームを表示
    public function showArticleCreate()
    {
        return view('admin.layouts.article_create');
    }

    // お知らせを作成
    public function createArticle(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Article::createArticle($validatedData);

        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを作成しました。');
    }

    // お知らせを更新
    public function updateArticle(UpdateArticleRequest $request, $id)
    {
        Article::updateArticle($id, $request->validated());

        return redirect()->route('admin.show.article.edit', ['id' => $id])->with('success', 'お知らせを更新しました。');
    }

    // お知らせを削除
    public function deleteArticle($id)
    {
        Article::deleteArticle($id);

        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを削除しました。');
    }
}
