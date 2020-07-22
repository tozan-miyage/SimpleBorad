<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //カラムを定義
    public function up()
    {//データベース構造を定義
     //postsという名前のテーブルを作る-Blueprintオブジェクトとして、メソッド$tableを定義
        Schema::create('posts', function (Blueprint $table) {
            //increment 
            $table->bigIncrements('id');
            //短い文字列
            $table->string('title');
            //長い文字列
            $table->text('content');
            //登録日・変更日
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
        Schema::dropIfExists('posts');
    }
}
