<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curriculums = [];

        for ($grade_id = 1; $grade_id <= 12; $grade_id++) {
            for ($i = 1; $i <= 2; $i++) {
                $curriculums[] = [
                    'title' => "小学校{$grade_id}年生その{$i}",
                    'thumbnail' => 'https://picsum.photos/200/300',
                    'description' => '説明文が入ります。説明文が入ります。説明文が入ります。説明文が入ります。',
                    'video_url' => 'https://www.youtube.com/embed/IqKz0SfHaqI',
                    'alway_delivery_flg' => 1,
                    'grade_id' => $grade_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('curriculums')->insert($curriculums);
    }
}
