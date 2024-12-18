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
        Schema::create('writing_links', function (Blueprint $table) {
            $table->id();
            $table->string('LabelType');
            $table->string('LabelIdentity')->comment('标签Id');
            $table->string('LabelDescription')->nullable()->comment('标签描述信息');
            $table->string('ResourceType');
            $table->unsignedInteger('ResourceId');
            $table->string('ResourcePath')->comment('资源链接的相对路径');
            $table->string('Value')->comment('标签值');
            $table->unsignedInteger('Start')->comment('标签值在resourcePath所指的内容中的起始位置');
            $table->unsignedInteger('Length')->comment('标签值在resourcePath所指的内容中的长度');
            $table->unsignedInteger('Weight')->comment('标签的置信度，数值越小越高');
            $table->text('LabelData')->nullable();
            $table->boolean('IsDeleted')->comment('标签是否已经被删除');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writing_links');
    }
};
