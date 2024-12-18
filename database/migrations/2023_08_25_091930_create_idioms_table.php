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
         * "derivation":" 《醒世恒言·卖油郎独占花魁》那些有势有力的不肯出钱，专要讨人便宜。及至肯出几两银子的，女儿又嫌好道歉，做张做智的不肯。”",
         * "example":"[阮小七]提着双拳说道我老爷在此吃几杯酒儿，干你鸟事！～要来拿我！”★《水浒传》第一回",
         * "explanation":"犹言装模作样，装腔作势。",
         * "pinyin":"zuò zhāng zuò zhì",
         * "word":"做张做智",
         * "abbreviation":"zzzz"
         * }
         */
        Schema::create('idioms', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation');
            $table->string('word');
            $table->string('pinyin');
            $table->text('explanation');
            $table->text('example');
            $table->text('derivation');
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
        Schema::dropIfExists('idioms');
    }
};
