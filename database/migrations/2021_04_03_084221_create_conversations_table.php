<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('attente');
            $table->unsignedBigInteger('acheteur_id');
            $table->unsignedBigInteger('proprietaire_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
        });

        Schema::table('conversations', function($table)
        {   $table->foreign('acheteur_id')
            ->references('user_id')->on('utilisateurs')
            ->onDelete('cascade');
            $table->foreign('proprietaire_id')
            ->references('user_id')->on('utilisateurs')
            ->onDelete('cascade');
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
        Schema::dropIfExists('conversations');
    }
}
