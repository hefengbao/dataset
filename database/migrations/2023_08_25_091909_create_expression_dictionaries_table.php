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
         * {"ci": "作陪", "explanation": "1.当陪客。"}
         */
        Schema::create('expression_dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string('expression');
            $table->text('explanation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expression_dictionaries');
    }
};
