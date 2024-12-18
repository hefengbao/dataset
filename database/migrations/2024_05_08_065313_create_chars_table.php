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
        Schema::create('chars', function (Blueprint $table) {
            $table->id();
            $table->string('char');
            $table->unsignedInteger('strokes');
            $table->string('pinyin');
            $table->string('pinyin2');
            $table->string('radicals');
            $table->tinyInteger('frequency');
            $table->string('structure')->nullable();
            $table->string('traditional')->nullable();
            $table->string('variant')->nullable();
            $table->text('pronunciations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chars');
    }
};
