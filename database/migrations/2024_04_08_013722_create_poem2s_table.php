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
        Schema::create('poem2s', function (Blueprint $table) {
            $table->id();
            $table->string('dynasty')->comment('朝代');
            $table->string('writer')->comment('作者');
            $table->text('writer_introduction')->nullable()->comment('作者简介');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->nullable()->comment('副标题');
            $table->string('preface',2000)->nullable()->comment('诗序');
            $table->text('content')->comment('内容');
            $table->text('annotation')->nullable()->comment('注释');
            $table->text('translation')->nullable()->comment('译文');
            $table->text('creative_background')->nullable()->comment('创作背景');
            $table->text('explain')->nullable()->comment('解读');
            $table->text('comment')->nullable()->comment('诗评');
            $table->string('collection')->nullable()->comment('合集');
            $table->string('category')->nullable()->comment('分类');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poem2s');
    }
};
