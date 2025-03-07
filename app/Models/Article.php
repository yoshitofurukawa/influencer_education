<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'posted_date',
        'article_contents',
    ];

    public static function createArticle(array $data)
    {
        return DB::transaction(function () use ($data) {
            return self::create($data);
        });
    }

    public static function updateArticle($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $article = self::findOrFail($id);
            $article->update($data);
            return $article;
        });
    }

    public static function deleteArticle($id)
    {
        return DB::transaction(function () use ($id) {
            $article = self::findOrFail($id);
            $article->delete();
        });
    }
}
