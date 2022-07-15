<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Carbon\Carbon;

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
    public function definition()
    {
        $created_at = Carbon::createFromTimestamp(
            fake()->dateTimeBetween('-1 years', '+1 month')
            ->getTimeStamp()
        ) ;

        $email_verified_at= Carbon::createFromFormat('Y-m-d H:i:s', $created_at)
            ->addHours( fake()->numberBetween( 1, 8 ) );
        
        $updated_at= Carbon::createFromFormat('Y-m-d H:i:s', $created_at)
            ->addHours( fake()->numberBetween( 9, 500 ) );

        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => $email_verified_at,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => $created_at->toDateTimeString(),
            'updated_at' => $updated_at,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
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
