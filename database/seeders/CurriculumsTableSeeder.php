<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Curriculum;
use App\Models\DeliveryTime;
use App\Models\Grade;

class CurriculumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Curriculum::factory(20)->create()->each(function ($curriculum) {
            DeliveryTime::factory(rand(4))->create([
                'curriculums_id' => $curriculum->id,
            ]);
        });



    }
}
