<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'product'.$this->faker->name(),
            'alias'	=> 'product',
            'full_path'	=> $this->faker->filePath(),
            'category_id' => $this->faker->numberBetween(1,20),
            'product_code' => $this->faker->randomNumber(9),
            'id_1c' => $this->faker->randomNumber(9),
            'description' => $this->faker->text(50),
            'weight' => $this->faker->numberBetween(100,300),
            'length' => $this->faker->numberBetween(100,300),
            'width' => $this->faker->numberBetween(100,300),
            'height' => $this->faker->numberBetween(100,300),
            'volume' => $this->faker->randomNumber(2),
            'order' => 99,
            'price' => $this->faker->numberBetween(400,3000),
            'old_price' => 3000 + $this->faker->randomNumber(3),
            'discount_percent' => NULL,
            'image_id' => $this->faker->numberBetween(1,100),
            'sale' => $this->faker->numberBetween(0,1),
            'recommended' => $this->faker->numberBetween(0,1),
            'active' => $this->faker->numberBetween(0,1),
            'seo_text' => $this->faker->text(10),
            'seo_description' => $this->faker->text(10),
            'seo_keywords' => $this->faker->text(10),
            'seo_title' => $this->faker->text(10),
            'seo_h1' => $this->faker->text(10),
        ];
    }
}
