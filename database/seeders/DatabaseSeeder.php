<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DeliveryTime;
use Illuminate\Database\Seeder;
use Database\Seeders\CurriculumsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // `curriculums` を作成
        \App\Models\Curriculum::factory(20)->create();

        \App\Models\DeliveryTime::factory(20)->create();

        $this->call(CurriculumsTableSeeder::class);

        // `delivery_times` のシードを実行
        $this->call(DeliveryTimesTableSeeder::class);
    }
}
