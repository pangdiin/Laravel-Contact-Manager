<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsAndContactsTable extends Migration
{
    
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('contacts', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->default(0);
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::drop('groups');
        Schema::drop('contacts');
    }
}
