<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisationBonsTable extends Migration
{
    public function up()
    {
        Schema::create('utilisation_bons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bon_id')->constrained()->onDelete('cascade');
            $table->string('nom_client');
            $table->string('formation');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisation_bons');
    }
}