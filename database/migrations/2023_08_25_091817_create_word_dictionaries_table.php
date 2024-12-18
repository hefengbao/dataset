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
         * "word": "繓",
         * "oldword": "繓",
         * "strokes": "10",
         * "pinyin": "zuǒ",
         * "radicals": "",
         * "explanation": "繓zuǒ 1.丝织品。 2.病名。",
         * "more": "搜索与“繓”有关的包含有“繓”字的成语 查找以“繓”打头的成语接龙"
         */
        Schema::create('word_dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('oldword')->nullable();
            $table->integer("strokes");
            $table->string("pinyin");
            $table->string("radicals")->nullable();
            $table->text("explanation");
            $table->longText("more_explanation");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_dictionaries');
    }
};
