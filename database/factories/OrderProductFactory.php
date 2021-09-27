<?php

namespace Database\Factories;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1,100),
            'product_id' => $this->faker->numberBetween(1,100),
            'product_name' => 'product name',
            'price'	=> 9999,
            'quantity' => 5,
            'size_option_id' => 1000,
            'sum' => 10000,

        ];
    }
}
