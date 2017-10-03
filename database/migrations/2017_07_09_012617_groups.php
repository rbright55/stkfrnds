<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Groups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->boolean('approval');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('group_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        //possible roles (member,contributor,approver,partner,admin)

        Schema::create('group_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('group_role_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('group_users', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_role_id')->references('id')->on('group_roles')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('group_predictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prediction_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('user_id')->unsigned();
            //user who shared the prediction
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('group_predictions', function($table) {
            $table->foreign('prediction_id')->references('id')->on('predictions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_predictions');
        Schema::drop('group_users');
        Schema::drop('group_roles');
        Schema::drop('groups');
    }
}
