<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Asegúrate de importar DB

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('category_id');
            $table->bigInteger('classification_id');
            $table->string('url_video')->nullable();
            $table->string('key_video')->nullable();
            $table->date('created_at')->nullable()->default(DB::raw('CURRENT_DATE')); // Usa DB::raw
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });

        // Agregar claves foráneas
        Schema::table('video', function (Blueprint $table) {
            $table->foreign(['category_id'], 'fk_category')->references(['id'])->on('category')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['classification_id'], 'fk_classification')->references(['id'])->on('classification')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('video', function (Blueprint $table) {
            $table->dropForeign('fk_category');
            $table->dropForeign('fk_classification');
        });

        Schema::dropIfExists('video');
    }
};
