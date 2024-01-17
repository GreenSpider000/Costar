<?php

namespace Modules\Collection\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Collection\Models\Subject;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => substr($this->faker->text(30), 0, -1),
            'slug' => '',
            'site' => '',
            'taxon_id' => $this->faker->numberBetween(1, 5),
            'status' => 1,
            'description' => $this->faker->paragraph,
            'meta_title' => '',
            'meta_keywords' => '',
            'meta_description' => '',
            'created_by_name' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
