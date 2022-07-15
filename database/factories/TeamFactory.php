<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $created_at = Carbon::createFromTimestamp(
            fake()->dateTimeBetween('-2 years', '+1 month')
            ->getTimeStamp()
        ) ;
        
        $updated_at= Carbon::createFromFormat('Y-m-d H:i:s', $created_at)
            ->addHours( fake()->numberBetween( 9, 500 ) );

        return [
            'name' => fake()->word(2, true),
            'description' => fake()->paragraph(),
            'created_at' => $created_at->toDateTimeString(),
            'updated_at' => $updated_at,
        ];
    }
}
