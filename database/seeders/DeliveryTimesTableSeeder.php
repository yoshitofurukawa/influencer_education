<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeliveryTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $curriculumIds = DB::table('curriculums')->pluck('id')->toArray();

        if (empty($curriculumIds)) {
            echo "❌ curriculums テーブルにデータがないため、delivery_times のシードをスキップ\n";
            return;
        }

        DB::table('delivery_times')->insert([
            [
                'curriculums_id' => 1, // 存在するcurriculum_idを指定
                'delivery_from' => Carbon::now()->addDays(1),
                'delivery_to' => Carbon::now()->addDays(1)->addHours(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'curriculums_id' => 2, // 存在するcurriculum_idを指定
                'delivery_from' => Carbon::now()->addDays(2),
                'delivery_to' => Carbon::now()->addDays(2)->addHours(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'curriculums_id' => 3, // 存在するcurriculum_idを指定
                'delivery_from' => Carbon::now()->addDays(3),
                'delivery_to' => Carbon::now()->addDays(3)->addHours(3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'curriculums_id' => 4, // 存在するcurriculum_idを指定
                'delivery_from' => Carbon::now()->addDays(4),
                'delivery_to' => Carbon::now()->addDays(4)->addHours(4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'curriculums_id' => 5, // 存在するcurriculum_idを指定
                'delivery_from' => Carbon::now()->addDays(5),
                'delivery_to' => Carbon::now()->addDays(5)->addHours(5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'curriculums_id' => 6, // 存在するcurriculum_idを指定
                'delivery_from' => Carbon::now()->addDays(6),
                'delivery_to' => Carbon::now()->addDays(6)->addHours(6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
