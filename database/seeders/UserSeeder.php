<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeder to create new users.
     *
     * @return void
     */
    public function run()
    {
        // Use the user factory to create users
        User::factory()->count(50)->create();
    }
}
