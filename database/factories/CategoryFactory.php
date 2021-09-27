<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => 'category'.$this->faker->name(),
            'alias'	=> 'category',
            'full_path'	=> $this->faker->filePath(),
            'parent_id' => $this->faker->numberBetween(1,20),
            'id_1c' => $this->faker->randomNumber(9),
            'order' => 99,
            'content' => 'content',
            'seo_description' => $this->faker->text(10),
            'seo_keywords' => $this->faker->text(10),
            'seo_title' => $this->faker->text(10),
            'seo_h1' => $this->faker->text(10),
            'image_id' => $this->faker->numberBetween(1,100),
            'show_on_main' => $this->faker->numberBetween(0,1),
            'active' => $this->faker->numberBetween(0,1),

        ];
    }
}
