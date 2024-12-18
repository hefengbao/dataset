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
        Schema::create('cook_ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('other_names')->nullable()->comment('别名');
            $table->string('category');
            $table->string('category2')->nullable();
            $table->integer('calorie')->nullable()->comment('热量/100g');
            $table->text('images')->nullable()->comment('图片');
            $table->text('desc')->nullable()->comment('描述');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cook_ingredients');
    }
};
