<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country' => $this->faker->country(),
//            'region' =>	$this->faker->
            'city' => $this->faker->city(),
            'postcode' => $this->faker->postcode(),
            'street' => $this->faker->streetName(),
            'house' => $this->faker->streetAddress(),
//            'apartment' => $this->faker->
        ];
    }
}
