<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showArticleList()
    {
        $articles = Article::latest()->paginate(10);
        return view('article_list',compact('articles'));
    }
}
