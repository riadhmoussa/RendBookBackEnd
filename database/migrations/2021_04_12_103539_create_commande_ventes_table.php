<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_ventes', function (Blueprint $table) {
            $table->id();
            $table->string('prix');
            $table->unsignedBigInteger('commande_id');
            $table->timestamps();
        });

        Schema::table('commande_ventes', function($table)
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
        Schema::dropIfExists('commande_ventes');
    }
}
