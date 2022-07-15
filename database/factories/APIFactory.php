<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\API>
 */
class APIFactory extends Factory
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
        
        $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $created_at)
            ->addHours( fake()->numberBetween( 9, 500 ) );
        
        $json_data = json_encode([
            fake()->word(2, true) => fake()->paragraph(),
            'special_date' =>  fake()->dateTimeBetween('-2 years', '+1 month'),
            fake()->word(2, true) => rand(11,99),
        ]);

        return [
            'user_id' => fake()->numberBetween( 1, 2 ),
            'api_type_id' => fake()->numberBetween( 1, 500 ),
            'name' => fake()->word(2, true),
            'description' => fake()->paragraph(),
            'num_sets' => fake()->numberBetween( 1, 500 ),
            'template' => $json_data,
            'created_at' => $created_at->toDateTimeString(),
            'updated_at' => $updated_at,
        ];
    }
}
