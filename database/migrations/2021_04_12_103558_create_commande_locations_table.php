<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_locations', function (Blueprint $table) {
            $table->id();
            $table->string('prix');
            $table->string('date_debut');
            $table->string('date_final');
            $table->unsignedBigInteger('commande_id');
            $table->timestamps();
        });
        Schema::table('commande_locations', function($table)
        {   $table->foreign('commande_id')
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
        Schema::dropIfExists('commande_locations');
    }
}
