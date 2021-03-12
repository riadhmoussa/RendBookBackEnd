<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriercommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courriercommunications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',255)->required;
            $table->string('phone_number');
            $table->string('email');
            $table->string('subject');
            $table->string('text_body');
            $table->integer('utilisateur_id');
            $table->foreign('utilisateur_id')->references('user_id')->on('utitlisateurs');
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
        Schema::dropIfExists('courriercommunications');
    }
}
