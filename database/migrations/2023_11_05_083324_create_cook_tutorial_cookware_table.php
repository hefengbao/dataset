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
        Schema::create('cook_tutorial_cookware', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tutorial_id');
            $table->unsignedInteger('cookware_id');

            $table->index(['tutorial_id','cookware_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cook_tutorial_cookware');
    }
};
