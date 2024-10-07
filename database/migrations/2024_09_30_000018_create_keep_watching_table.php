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
            $table->id();
            $table->unsignedBigInteger('video_id');
            $table->unsignedBigInteger('profile_id');
            $table->integer('minute')->nullable();
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('video')->onDelete('cascade')->onUpdate('cascade')->name('fk_video');
            $table->foreign('profile_id')->references('id')->on('profile')->onDelete('cascade')->onUpdate('cascade')->name('fk_profile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keep_watching');
    }
};
