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
        Schema::create('people', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Name');
            $table->string('BirthYear')->nullable();
            $table->string('Birthday')->nullable();
            $table->string('DeathYear')->nullable();
            $table->string('Deathday')->nullable();
            $table->string('Dynasty')->nullable();
            $table->text('Aliases')->nullable();
            $table->text('Titles')->nullable();
            $table->text('Hometown')->nullable();
            $table->longText('Details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
