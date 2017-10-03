<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Predictions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('stock_id')->unsigned();
            $table->longText('description')->nullable();
            $table->date('period_start');
            $table->date('period_end');
            $table->enum('direction',['up','down']);
            $table->decimal('amount')->nullable();
            $table->enum('visibility',['public','private','followers']);
            //visibility can be public/private/followers
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('predictions', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('prediction_votes', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('prediction_id')->unsigned();
            $table->boolean('like');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('prediction_votes', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prediction_id')->references('id')->on('predictions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prediction_votes');
        Schema::drop('predictions');
    }
}
