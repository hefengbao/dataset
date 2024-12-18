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
        Schema::create('cook_tutorial_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tutorial_id');
            $table->unsignedInteger('tag_id');

            $table->index(['tutorial_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cook_tutorial_tag');
    }
};
