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
        Schema::create('cook_tutorials', function (Blueprint $table) {
            $table->id();
            $table->string('bv')->comment('B站bv号');
            $table->string('name')->comment('名称');
            $table->string('method')->nullable()->comment('做法');
            $table->string('difficulty_level')->comment('难易程度');
            $table->string('category')->comment('类别');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cook_tutorials');
    }
};
