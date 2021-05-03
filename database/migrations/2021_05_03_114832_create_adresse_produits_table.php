<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdresseProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresse_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adresses_id');
            $table->unsignedBigInteger('produits_id');
            $table->timestamps();
        });

         Schema::table('adresse_produits', function($table)
        {
            $table->foreign('adresses_id')
            ->references('id')->on('adresses')
            ->onDelete('cascade');
            
            $table->foreign('produits_id')
            ->references('id')->on('produits')
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
        Schema::dropIfExists('adresse_produits');
    }
}
