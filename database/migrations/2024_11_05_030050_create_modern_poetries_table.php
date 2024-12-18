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
        Schema::create('modern_poetries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('标题');
            $table->string('author')->comment('作者');
            $table->text('content')->comment('内容');
            $table->text('zhu')->nullable()->comment('注释');
            $table->text('yi')->nullable()->comment('翻译');
            $table->text('shang')->nullable()->comment('赏析');
            $table->text('author_info')->nullable()->comment('作者介绍');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modern_poetries');
    }
};
