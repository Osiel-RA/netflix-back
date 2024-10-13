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
        Schema::create('profile_like', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('profile_id');
            $table->bigInteger('video_id');
            $table->boolean('add_my_list')->nullable()->default(false);
            $table->bigInteger('type_reaction_id');
            $table->date('created_at')->nullable()->default(DB::raw('CURRENT_DATE')); // Usa DB::raw
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });

        // Agregar claves foráneas
        Schema::table('profile_like', function (Blueprint $table) {
            $table->foreign(['profile_id'], 'fk_profile')->references(['id'])->on('profile')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['video_id'], 'fk_video')->references(['id'])->on('video')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['type_reaction_id'], 'fk_type_reaction')->references(['id'])->on('type_reaction')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile_like', function (Blueprint $table) {
            $table->dropForeign('fk_profile');
            $table->dropForeign('fk_video');
        });

        Schema::dropIfExists('profile_like');
    }
};