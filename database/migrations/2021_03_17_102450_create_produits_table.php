<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->required();
            $table->string('auteur')->required()->default('0');
            $table->string('detaills')->required();
            $table->string('type_service');
            $table->string('ville');
            $table->string('type_operation')->default('0');
            $table->string('prix_vente')->default('0');
            $table->string('prix_jour')->default('0');
            $table->string('prix_semaine')->default('0');
            $table->string('prix_annee')->default('0');
            $table->string('chemin_image');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_categrie');
            $table->timestamps();
        });

        Schema::table('produits', function($table)
        {
            $table->foreign('id_categrie')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            
            $table->foreign('user_id')
            ->references('user_id')->on('utilisateurs')
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
        Schema::dropIfExists('produits');
    }
}
