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
        Schema::create('user_card', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('card_id');
            $table->string('name', 255);
            $table->char('account_number', 16);
            $table->char('cvv', 3);
            $table->date('expiration_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade')->name('fk_user');
            $table->foreign('card_id')->references('id')->on('card')->onDelete('cascade')->onUpdate('cascade')->name('fk_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_card');
    }
};
