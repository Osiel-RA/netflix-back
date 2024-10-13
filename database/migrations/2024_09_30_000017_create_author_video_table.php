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
        Schema::create('author_video', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->date('created_at')->nullable()->default(DB::raw('CURRENT_DATE')); // Usar DB::raw para evitar error
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });

        Schema::table('author_video', function (Blueprint $table) {
            $table->foreign(['author_id'], 'fk_author')->references(['id'])->on('author')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['video_id'], 'fk_video')->references(['id'])->on('video')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('author_video', function (Blueprint $table) {
            $table->dropForeign('fk_author');
            $table->dropForeign('fk_video');
        });

        Schema::dropIfExists('author_video');
    }
};
