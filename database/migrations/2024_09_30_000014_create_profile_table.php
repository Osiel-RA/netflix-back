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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('classification_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->foreign('language_id')->references('id')->on('language')->onDelete('set null')->onUpdate('cascade')->name('fk_language');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('set null')->onUpdate('cascade')->name('fk_user');
            $table->foreign('classification_id')->references('id')->on('classification')->onDelete('set null')->onUpdate('cascade')->name('fk_classification');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('set null')->onUpdate('cascade')->name('fk_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
