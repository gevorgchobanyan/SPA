<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

        'user_id' => $this->faker->numberBetween(1,100),
        'status_id' => $this->faker->numberBetween(1,6),
        'code' => $this->faker->randomNumber(9),
        'delivery_method' => $this->faker->randomElement(['sdek', 'post']),
        'delivery_type'	=> $this->faker->randomElement(['sdek', 'post']),
        'delivery_address' => $this->faker->address(),
        'pickup_point' => $this->faker->address(),
        'delivery_date'	=> $this->faker->date(),
        'delivery_time'	=> $this->faker->time(),
        'delivery_price' =>	$this->faker->numberBetween(300,3000),
        'discount_sum' => NULL,
        'bonus_used' =>	NULL,
        'total' => 5000,
        'payment_type' => $this->faker->randomElement(['card', 'cash']),
        'paid' => $this->faker->numberBetween(0,1),
        ];
    }
}
