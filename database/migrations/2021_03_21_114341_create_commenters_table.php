<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commenters', function (Blueprint $table) {
            $table->id();
            $table->string('crops')->required();
            $table->unsignedBigInteger('id_produit');
            $table->timestamps();
        });

        Schema::table('commenters', function($table)
        {
            $table->foreign('id_produit')
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
        Schema::dropIfExists('commenters');
    }
}
