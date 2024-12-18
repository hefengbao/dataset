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
        Schema::create('glossaries', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Keys', 2000);
            $table->text('RelatedPersons')->nullable();
            $table->text('Correlations')->nullable();
            $table->text('References')->nullable();
            $table->text('Quotes')->nullable();
            $table->text('Explains')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossaries');
    }
};
