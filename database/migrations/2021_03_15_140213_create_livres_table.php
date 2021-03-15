<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->required();
            $table->string('auteur')->required();
            $table->string('detaills')->required();
            $table->unsignedBigInteger('id_categrie');
            $table->string('ville');
            $table->string('type_operation');
            $table->string('prix_vente');
            $table->string('prix_jour');
            $table->string('prix_semaine');
            $table->string('prix_annee');
            $table->string('prix_garantie');
            $table->string('chemin_image');
            
            $table->timestamps();
        });

        Schema::table('livres', function($table)
        {
            $table->foreign('id_categrie')
            ->references('id')->on('categories')
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
        Schema::dropIfExists('livres');
    }
}
