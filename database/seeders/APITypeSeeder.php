<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class APITypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('api_types')->insert([
            'name' => "GET",
            'description' => Str::random(10),
        ]);

        DB::table('api_types')->insert([
            'name' => "POST",
            'description' => Str::random(10),
        ]);
    }
}
