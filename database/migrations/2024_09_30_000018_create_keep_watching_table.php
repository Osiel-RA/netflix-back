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
        Schema::create('keep_watching', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('video_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table->integer('minute')->nullable();
            $table->date('created_at')->nullable()->default(DB::raw('CURRENT_DATE')); // Usar DB::raw para evitar error
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });

        Schema::table('keep_watching', function (Blueprint $table) {
            $table->foreign(['profile_id'], 'fk_profile')->references(['id'])->on('profile')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['video_id'], 'fk_video')->references(['id'])->on('video')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keep_watching', function (Blueprint $table) {
            $table->dropForeign('fk_profile');
            $table->dropForeign('fk_video');
        });

        Schema::dropIfExists('keep_watching');
    }
};
