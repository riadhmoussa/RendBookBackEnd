<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string("contenu");
            $table->string('expediteur_id');
            $table->string('receveur_di');
            $table->unsignedBigInteger('conversation_id');
            $table->timestamps();
        });
        Schema::table('messages', function($table)
        {   $table->foreign('conversation_id')
            ->references('id')->on('conversations')
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
        Schema::dropIfExists('messages');
    }
}
