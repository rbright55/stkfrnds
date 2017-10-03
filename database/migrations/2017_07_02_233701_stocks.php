<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('symbol');
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('yfinance')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        //more information about the stock like description, website

        Schema::create('stock_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sector');
            $table->string('industry');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('stock_watchers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('stock_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('stocks', function($table) {
            $table->foreign('category_id')->references('id')->on('stock_categories')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('stock_watchers', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stock_watchers');
        Schema::drop('stocks');
        Schema::drop('stock_categories');
    }
}
