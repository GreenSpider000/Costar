<?php

namespace Modules\Article\Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => substr($this->faker->text(20), 0, -1),
            'slug' => '',
            'status' => 1,
            'description' => $this->faker->paragraph,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
