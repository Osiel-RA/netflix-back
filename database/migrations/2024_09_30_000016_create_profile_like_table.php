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
        Schema::create('profile_like', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('video_id');
            $table->boolean('add_my_list')->default(false);
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('profile')->onDelete('cascade')->onUpdate('cascade')->name('fk_profile');
            $table->foreign('video_id')->references('id')->on('video')->onDelete('cascade')->onUpdate('cascade')->name('fk_video');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_like');
    }
};
