<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            ['id' => 1, 'name' => '小学校1年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => '小学校2年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' =>  '小学校3年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' =>  '小学校4年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' =>  '小学校5年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => '小学校6年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => '中学校1年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => '中学校2年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => '中学校3年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => '高校1年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' =>  '高校2年生', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => '高校3年生', 'created_at' => now(), 'updated_at' => now()],


        ]);

    }
}
