<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {            
            $table->unsignedBigInteger('gerantAdmin_id')->nullable();
            $table->foreign('gerantAdmin_id')->references('id')->on('gerant_admins')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gerant_admin', function (Blueprint $table) {
            //
        });
    }
};
