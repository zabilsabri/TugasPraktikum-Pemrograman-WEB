<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_category')->onDelete('set null');
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
        Schema::dropIfExists('articles');
    }
};
