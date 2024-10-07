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
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('video_id');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('author')->onDelete('cascade')->onUpdate('cascade')->name('fk_author');
            $table->foreign('video_id')->references('id')->on('video')->onDelete('cascade')->onUpdate('cascade')->name('fk_video');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_video');
    }
};
