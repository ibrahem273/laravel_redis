<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email'=> fake()->email,
            'national_id'=>fake()->numberBetween(),
            'name' => fake()->name,
            'subscription_end_date' =>$this->faker-> dateTimeBetween('-30 days', '+30 days')
        ];
    }
}

