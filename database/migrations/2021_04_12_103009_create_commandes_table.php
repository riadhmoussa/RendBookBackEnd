<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('typeCommande');
            $table->string('prix')->default('0');
            $table->string('DateDebut')->default('99/12/9999');
            $table->string('DateFin')->default('99/12/9999');
            $table->string('cancled')->default('false');
            $table->string('payee')->default('false');
            $table->string('status')->default('attente');
            $table->unsignedBigInteger('conversation_id');
            $table->timestamps();
        });

        Schema::table('commandes', function($table)
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
        Schema::dropIfExists('commandes');
    }
}
