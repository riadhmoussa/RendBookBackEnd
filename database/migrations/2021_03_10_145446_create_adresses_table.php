<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('ville',255);
            $table->string('region', 255);
            $table->string('rue', 255);
            $table->string('batiment', 255);
            $table->unsignedBigInteger('utilisateur_id');
            $table->timestamps();
        });
        Schema::table('adresses', function($table)
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
        Schema::dropIfExists('adresses');
    }
}
