<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('details');
            $table->string('notes_administration');
            $table->boolean('seen');
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('commande_id');
            $table->timestamps();
        });
         Schema::table('claims', function($table)
        {
            $table->foreign('utilisateur_id')
            ->references('user_id')->on('utilisateurs')
            ->onDelete('cascade');
        });

          Schema::table('claims', function($table)
        {
            $table->foreign('commande_id')
            ->references('id')->on('commandes')
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
        Schema::dropIfExists('claims');
    }
}
