<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('objectif');
            $table->string('lieu');
            $table->string('public_cible');
            $table->string('formateur');
            $table->text('prerequis');
            $table->text('programme');
            $table->string('duree');
            $table->decimal('tarif', 10, 2);
            $table->text('description');
            $table->string('image')->nullable();
            $table->foreignId('sous_formation_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cours');
    }
}
