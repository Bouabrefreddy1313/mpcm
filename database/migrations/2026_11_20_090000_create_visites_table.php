<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            // Empreinte anonyme du visiteur (IP + navigateur hachés) : aucune IP stockée en clair
            $table->char('visiteur', 64);
            $table->string('page', 255);
            $table->date('jour');
            $table->timestamp('created_at')->useCurrent();

            $table->index('jour');
            $table->index(['jour', 'visiteur']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
