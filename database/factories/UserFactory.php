<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'provinsi_id' => $this->faker->numberBetween(1, 34),
            'kabupaten_id' => $this->faker->numberBetween(1, 100),
            'role' => $this->faker->word(),
            'phone_number' => $this->faker->unique()->randomNumber(9, true),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt($this->faker->unique()->bothify('????????##')), // password
            'jalan' => $this->faker->streetAddress(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
