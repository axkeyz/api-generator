<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration to create the apis table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apis', function (Blueprint $table) {
            // Set columns
            $table->uuid('id')->unique()->primary();
            $table->foreignId('user_id');
            $table->foreignId('api_type_id');
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->json('template')->nullable();
            $table->integer('num_sets');
            $table->boolean('disabled')->default(false);
            $table->timestamps();

            // Set foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('api_type_id')->references('id')->on('api_types');
        });
    }

    /**
     * Reverse the migration by deleting the apis table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apis');
    }
};