<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->integer("note");
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
        });
          Schema::table('avis', function($table)
        {
            $table->foreign('utilisateur_id')
            ->references('user_id')->on('utilisateurs')
            ->onDelete('cascade');
        });

          Schema::table('avis', function($table)
        {
            $table->foreign('product_id')
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
        Schema::dropIfExists('avis');
    }
}
