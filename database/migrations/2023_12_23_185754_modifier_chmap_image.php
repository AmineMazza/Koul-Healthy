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
        Schema::table('products', function (Blueprint $table) {
            // Vérifiez si la colonne 'images' n'existe pas avant de l'ajouter
            if (!Schema::hasColumn('products', 'image')) {
                $table->json('image')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Supprimez la colonne 'images' si elle existe
            if (Schema::hasColumn('products', 'images')) {
                $table->dropColumn('images');
            }
        });
    }
};
