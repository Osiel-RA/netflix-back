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
        Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('classification_id');
            $table->string('url_video', 255)->nullable();
            $table->string('key_video', 255)->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade')->name('fk_category');
            $table->foreign('classification_id')->references('id')->on('classification')->onDelete('cascade')->onUpdate('cascade')->name('fk_classification');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
