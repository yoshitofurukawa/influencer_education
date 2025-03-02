<?php

namespace Database\Factories;

use App\Models\DeliveryTime;
use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryTime>
 */
class DeliveryTimeFactory extends Factory
{

    protected $model = DeliveryTime::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'curriculums_id' =>Curriculum::inRandomOrder()->first()->id ?? 1,
            'delivery_from' => now()->addDays(rand(1,30)),
            'delivery_to' =>now()->addDays(rand(31,60)),
        ];
    }
}
