<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // title と body と image_path を追記
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // 本ののタイトルを保存するカラム
            $table->string('body');  // 本の感想を保存するカラム
            $table->integer('page1'); //重要なページ1
            $table->string('word1'); //重要な一文1
            $table->integer('page2')->nullable(); //重要なページ2
            $table->string('word2')->nullable(); //重要な一文2
            $table->integer('page3')->nullable(); //重要なページ3
            $table->string('word3')->nullable(); //重要な一文3
            $table->string('important'); //3つから感じた重要な事
            $table->string('plan'); //何を計画するか
            $table->string('action'); //実行する事
            $table->string('image_path')->nullable();  // 画像のパスを保存するカラム
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
        Schema::dropIfExists('book');
    }
}
