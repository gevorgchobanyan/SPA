<?php

namespace Database\Factories;

use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1,100),
            'option_id' => $this->faker->numberBetween(1,3),
            'option_value_id' => $this->faker->numberBetween(1,50),
            'quantity' => 99,
            'price' => 8888,
        ];
    }
}
