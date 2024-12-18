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
        Schema::create('world_cultural_heritages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('year');
            $table->string('year2')->nullable();
            $table->string('level');
            $table->string('address');
            $table->string('image');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('world_cultural_heritages');
    }
};
