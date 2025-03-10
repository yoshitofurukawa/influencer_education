<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
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
    public function createArticle(CreateArticleRequest $request)
    {
        DB::beginTransaction();
        try {
            Article::create([
                'title' => $request->input('title'),
                'article_contents' => $request->input('content'),
                'posted_date' => now(),
            ]);

            DB::commit();
            return redirect()->route('admin.show.article.list')->with('success', 'お知らせを作成しました。');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.show.article.list')->with('error', 'お知らせの作成中にエラーが発生しました: ' . $e->getMessage());
        }
    }

    // お知らせを更新
    public function updateArticle(UpdateArticleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $article = Article::findOrFail($id);
            $article->update($request->validated());

            DB::commit();
            return redirect()->route('admin.show.article.edit', ['id' => $id])->with('success', 'お知らせを更新しました。');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.show.article.edit', ['id' => $id])->with('error', 'お知らせの更新中にエラーが発生しました: ' . $e->getMessage());
        }
    }

    // お知らせを削除
    public function deleteArticle($id)
    {
        DB::beginTransaction();
        try {
            $article = Article::findOrFail($id);
            $article->delete();

            DB::commit();
            return redirect()->route('admin.show.article.list')->with('success', 'お知らせを削除しました。');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.show.article.list')->with('error', 'お知らせの削除中にエラーが発生しました: ' . $e->getMessage());
        }
    }
}
