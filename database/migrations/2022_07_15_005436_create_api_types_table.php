<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration to create the api_types table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_types', function (Blueprint $table) {
            // Set columns
            $table->id();
            $table->string('name')->unique();
            $table->mediumText('description')->nullable();
            $table->boolean('disabled')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration by deleting the api_types table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_types');
    }
};
