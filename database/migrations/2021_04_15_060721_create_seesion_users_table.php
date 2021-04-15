<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeesionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seesion_users', function (Blueprint $table) {
            $table->id();
            $table->string('Token');
            $table->string('refresh_token');
            $table->dateTime('Token_expried');
            $table->dateTime('Refresh_Token_expried');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('seesion_users');
    }
}
