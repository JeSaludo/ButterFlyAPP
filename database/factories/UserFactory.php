<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'username' => $faker->userName,
            'wfp_permit' => $faker->word,
            'wcp_permit' => $faker->word,
            'business_name' => $faker->company,
            'owner_name' => $faker->name,
            'address' => $faker->address,
            'contact' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
            'validated' => $faker->boolean,
            'password' => bcrypt('password'), // Replace 'password' with the desired default password
            'role' => $faker->randomElement(['admin', 'user']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
