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
        Schema::create('chinese_character', function (Blueprint $table) {
            $table->id();
            $table->string('character')->comment('字');
            $table->string('character2')->nullable()->comment('异体字');
            $table->string('pinyin')->comment('拼音');
            $table->string('radical')->nullable()->comment('部首');
            $table->unsignedTinyInteger('stroke')->nullable()->comment('笔画');
            $table->string('wubi')->nullable()->comment('五笔');
            $table->text('explanations')->nullable()->comment('简要解释');
            $table->text('explanations2')->nullable()->comment('详细解释');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chinese_character');
    }
};
