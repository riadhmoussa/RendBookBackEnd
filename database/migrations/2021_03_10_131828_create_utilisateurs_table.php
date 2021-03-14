<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email',100)->unique();
            $table->string('url_picture');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('utilisateurs', function($table)
{
    $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade');

});
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
