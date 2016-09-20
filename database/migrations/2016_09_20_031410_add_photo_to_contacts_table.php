<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoToContactsTable extends Migration
{
    
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('photo')->nullable();
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
}
