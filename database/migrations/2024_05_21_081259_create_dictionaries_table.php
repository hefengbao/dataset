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
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string('char');
            $table->string('wubi')->nullable()->comment('五笔');
            $table->string('radical')->nullable()->comment('部首');
            $table->unsignedTinyInteger('stroke')->comment('笔画数');
            $table->string('pinyin')->nullable()->comment('拼音');
            $table->string('pinyin2')->nullable();
            $table->text('simple_explanation')->nullable();
            $table->text('explanation')->nullable();
            $table->boolean('loanword')->default(0)->comment('外来字');
            $table->boolean('flag')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionaries');
    }
};
