<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [];

        for ($i = 1; $i <= 10; $i++) {
            $articles[] = [
                'title' => "お知らせタイトル {$i}",
                'posted_date' => Carbon::now()->subDays($i),
                'article_contents' => "お知らせ本文が入ります。お知らせ本文が入ります。お知らせ本文が入ります。お知らせ本文が入ります。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('articles')->insert($articles);
    }
}
