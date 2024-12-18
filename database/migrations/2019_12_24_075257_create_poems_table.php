<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('dynasty')->nullable();
            $table->string('writer')->nullable();
            $table->unsignedBigInteger('writer_id')->nullable();
            $table->json('type')->nullable();
            $table->longText('content')->nullable();
            $table->longText('remark')->nullable();
            $table->longText('translation')->nullable();
            $table->longText('shangxi')->nullable();
            $table->string('audioUrl')->nullable();
            $table->string('audioUrl2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poems');
    }
}
