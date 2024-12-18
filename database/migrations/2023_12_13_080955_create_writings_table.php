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
        Schema::create('writings', function (Blueprint $table) {
            $table->id('Id');
            $table->unsignedInteger('GroupIndex')->nullable()->comment('如果是成组的作品，那么 GroupIndex 大于零，指第几首');
            $table->text('Classes')->nullable()->comment('作品的分类信息，目前只少数作品具有此属性，如军旅类');
            $table->text('Froms')->nullable()->comment('作品录入来源');
            $table->text('Allusions')->nullable()->comment('作品内容中引用了哪些典故，目前仅部分唐诗具备此信息');
            $table->string('Pictures', 2000)->nullable()->comment('与本作品有关的图片，目前主要是诗经类作品有此信息');
            $table->string('Dynasty')->nullable();
            $table->string('Author')->nullable();
            $table->unsignedInteger('AuthorId')->nullable();
            $table->string('AuthorDate')->nullable()->comment('创作日期，多数作品不具备');
            $table->string('AuthorYears')->nullable()->comment('创作年份，多数作品不具备');
            $table->string('AuthorPlace')->nullable()->comment('创作地点，多数作品不具备');
            $table->string('Type')->nullable()->comment('体裁');
            $table->string('TypeDetail', 2000)->nullable()->comment('细分体裁信息');
            $table->string('Rhyme')->nullable()->comment('作品所押韵部');
            $table->string('FirstClauseRhyme')->nullable();
            $table->string('Title', 2000)->nullable()->comment('作品题目');
            $table->string('SubTitle',2000)->nullable()->comment('副标题，常出现在组诗中');
            $table->text('TuneId')->nullable()->comment('如果本作品是词作，那么此处指出该作品用了哪一个词牌');
            $table->string('Preface',2000)->nullable()->comment('序');
            $table->longText('Clauses')->comment('作品内容');
            $table->text('Note')->nullable()->comment('对整首作品的按语、作者自注、跋等');
            $table->longText('Comments')->nullable()->comment('对作品的赏析、评价等');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writings');
    }
};
