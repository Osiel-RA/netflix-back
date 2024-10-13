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
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->bigInteger('language_id');
            $table->bigInteger('user_id');
            $table->bigInteger('classification_id');
            $table->bigInteger('status_id');
            $table->date('created_at')->nullable()->default(DB::raw('CURRENT_DATE')); // Usa DB::raw
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });

        // Agregar claves foráneas
        Schema::table('profile', function (Blueprint $table) {
            $table->foreign(['classification_id'], 'fk_classification')->references(['id'])->on('classification')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['language_id'], 'fk_language')->references(['id'])->on('language')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['status_id'], 'fk_status')->references(['id'])->on('status')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'fk_user')->references(['id'])->on('user')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->dropForeign('fk_classification');
            $table->dropForeign('fk_language');
            $table->dropForeign('fk_status');
            $table->dropForeign('fk_user');
        });

        Schema::dropIfExists('profile');
    }
};