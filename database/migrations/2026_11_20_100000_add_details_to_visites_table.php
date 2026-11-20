<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visites', function (Blueprint $table) {
            $table->string('pays', 80)->nullable()->after('jour');
            $table->char('code_pays', 2)->nullable()->after('pays');
            $table->string('region', 100)->nullable()->after('code_pays');
            $table->string('ville', 100)->nullable()->after('region');
            $table->string('appareil', 20)->nullable()->after('ville');   // Mobile, Ordinateur, Tablette
            $table->string('navigateur', 40)->nullable()->after('appareil');
            $table->string('systeme', 40)->nullable()->after('navigateur');
            $table->string('source', 60)->nullable()->after('systeme');   // Google, Facebook, WhatsApp, Accès direct…

            $table->index(['jour', 'pays']);
        });
    }

    public function down(): void
    {
        Schema::table('visites', function (Blueprint $table) {
            $table->dropIndex(['jour', 'pays']);
            $table->dropColumn(['pays', 'code_pays', 'region', 'ville', 'appareil', 'navigateur', 'systeme', 'source']);
        });
    }
};
