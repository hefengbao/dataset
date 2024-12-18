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
        Schema::create('idiom2s', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('abbr');
            $table->string('pinyin');
            $table->string('explanation', 2000)->nullable();
            $table->text('example')->nullable();
            $table->text('source')->nullable();
            $table->text('quote')->nullable();
            $table->text('similar')->nullable();
            $table->text('opposite')->nullable();
            $table->string('usage')->nullable();
            $table->text('story')->nullable();
            $table->text('notice')->nullable();
            $table->text('spelling')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiom2s');
    }
};
