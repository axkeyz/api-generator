<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\APIType;

class APITypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create API HTTP available type methods
        APIType::create([
            'name' => "GET",
            'description' => Str::random(10),
            'disabled' => false,
        ]);

        APIType::create([
            'name' => "POST",
            'description' => Str::random(10),
            'disabled' => false,
        ]);

        APIType::create([
            'name' => "PUT",
            'description' => Str::random(10),
        ]);

        APIType::create([
            'name' => "PATCH",
            'description' => Str::random(10),
        ]);

        APIType::create([
            'name' => "DELETE",
            'description' => Str::random(10),
        ]);
    }
}
