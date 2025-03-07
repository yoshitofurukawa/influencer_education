<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article; // Articleモデルを使用
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function showTop()
    {
        // 最新のお知らせを取得（例：投稿日時順に最新5件）
        $articles = Article::orderBy('posted_date', 'desc')->take(5)->get();

        // ビューにデータを渡して表示
        return view('user.layouts.top', compact('articles'));
    }
}
