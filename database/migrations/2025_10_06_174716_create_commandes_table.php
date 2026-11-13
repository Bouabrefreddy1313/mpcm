<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bon_id')->constrained()->onDelete('cascade');
            $table->string('telephone');
            $table->decimal('montant', 10, 2);
            $table->string('email');
            $table->enum('statut', ['en attente', 'validée', 'rejetée'])->default('en attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
