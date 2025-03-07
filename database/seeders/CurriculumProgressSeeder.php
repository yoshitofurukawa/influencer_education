<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CurriculumProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ダミーデータを挿入
        DB::table('curriculum_progress')->insert([
            [
                'curriculums_id' => 1,
                'users_id' => 1,
                'clear_flg' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 2,
                'users_id' => 1,
                'clear_flg' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 3,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 5,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 6,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 7,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 8,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 9,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 10,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 11,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 12,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 13,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curriculums_id' => 14,
                'users_id' => 1,
                'clear_flg' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
