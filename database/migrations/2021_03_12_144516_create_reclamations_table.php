<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('details',255);
            $table->string('notes_administration',500)->default('فارغ');
            $table->unsignedBigInteger('utilisateur_id');
            $table->timestamps();
        });
        Schema::table('reclamations', function($table)
        {
            $table->foreign('utilisateur_id')
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
        Schema::dropIfExists('reclamations');
    }
}
