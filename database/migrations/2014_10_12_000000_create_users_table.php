<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('user_follow', function (Blueprint $table) {
            $table->integer('user_following')->unsigned();
            $table->integer('user_followed')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('user_follow', function($table) {
            $table->foreign('user_following')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_followed')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_follow');
        Schema::dropIfExists('users');
    }
}
