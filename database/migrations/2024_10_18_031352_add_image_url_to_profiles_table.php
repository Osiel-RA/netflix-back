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
    Schema::table('profile', function (Blueprint $table) {
        $table->string('image_url')->nullable(); // Agrega la columna image_url
    });
}

public function down(): void
{
    Schema::table('profile', function (Blueprint $table) {
        $table->dropColumn('image_url'); // Elimina la columna si es necesario
    });
}

};
