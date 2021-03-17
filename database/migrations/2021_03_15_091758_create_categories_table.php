<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url_picture');
            $table->timestamps();
        });
        DB::table('categories')->insert([
            [
                'name' => "كتب دراسة",
                'url_picture' => "https://firebasestorage.googleapis.com/v0/b/rendbook.appspot.com/o/educativebook_icon.png?alt=media&token=2f99d1ae-8977-4dd8-a3d1-0f1e2c537d7d",
            ],
            [
                'name' => "روايات",
                'url_picture' => "https://firebasestorage.googleapis.com/v0/b/rendbook.appspot.com/o/novel_icon.png?alt=media&token=c0a7c70c-0af8-4935-ac8d-db27770989e9",
            ],
            [
                'name' => "ألغاز",
                'url_picture' => "https://firebasestorage.googleapis.com/v0/b/rendbook.appspot.com/o/mystery_icon.png?alt=media&token=cbe2cb83-4d0a-49d3-b54b-346de7ddd8e9",
            ],
            [
                'name' => "خدمات أكادمية",
                'url_picture' => "https://firebasestorage.googleapis.com/v0/b/rendbook.appspot.com/o/academicservices_icon.png?alt=media&token=3c47f0b4-2e53-4c0f-9822-2632d3c06fcf",
            ],
            [
                'name' => "أخرى",
                'url_picture' => "https://firebasestorage.googleapis.com/v0/b/rendbook.appspot.com/o/others_icon.png?alt=media&token=d7810aaa-8198-4f44-ba51-ade8b8697ac7",
            ],
            ] );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
