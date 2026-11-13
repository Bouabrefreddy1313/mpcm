<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('formation_clients', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->string('periode');
        $table->integer('nombre_personnes');
        $table->text('besoins');
        $table->enum('civilite', ['Monsieur', 'Madame', 'Autre']);
        $table->string('nom');
        $table->string('prenom');
        $table->string('email');
        $table->string('telephone');
        $table->string('entreprise')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_clients');
    }
};
