<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('imdbID', 10)->nullable();
            $table->string('Title', 100);
            $table->integer('Year')->unsigned();
            $table->string('Poster')->nullable();
            $table->text('Plot')->nullable();
            $table->string('Genre')->nullable();
            $table->timestamps();
        });

        Schema::create('film_user', function (Blueprint $table) {
            $table->id();
            $table->integer('film_id')->references('id')->on('films');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('rating')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
