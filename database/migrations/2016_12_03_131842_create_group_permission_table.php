<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('permission_id')->references('id')->on('permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_permission');
    }
}
