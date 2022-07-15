<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\API;
use Database\Seeders\APITypeSeeder;

class APISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use the APITypeSeeder to create API types
        $this->call(APITypeSeeder::class);
        
        // Use the API factory to create APIs
        API::factory()->count(200)->create();
    }
}
