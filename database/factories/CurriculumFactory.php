<?php

namespace Database\Factories;

use App\Models\Curriculum;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculum>
 */
class CurriculumFactory extends Factory
{
    protected $model = Curriculum::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'grade_id' => Grade::inRandomOrder()->first()->id ?? 1,
            'title' => $this->faker->sentence(3),
            'thumbnail' => 'https://picsum.photos/200/300',
            'description' => $this->faker->paragraph(),
            'video_url' => 'https://www.youtube.com/embed/IqKz0SfHaqI',
            'alway_delivery_flg' => $this->faker->boolean(),
        ];
    }
}
