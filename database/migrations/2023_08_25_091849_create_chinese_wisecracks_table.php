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
        /**
         * {
         * "riddle": "阿斗当皇帝",
         * "answer": "软弱无能"
         * }
         */
        Schema::create('chinese_wisecracks', function (Blueprint $table) {
            $table->id();
            $table->string('riddle');
            $table->string('answer');
            $table->char('first_letter',1);
            $table->char('first_word',3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chinese_wisecracks');
    }
};
