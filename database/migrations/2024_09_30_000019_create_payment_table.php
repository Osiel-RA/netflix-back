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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pay_method_id');
            $table->unsignedBigInteger('plan_type_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade')->name('fk_user');
            $table->foreign('pay_method_id')->references('id')->on('pay_method')->onDelete('cascade')->onUpdate('cascade')->name('fk_pay_method');
            $table->foreign('plan_type_id')->references('id')->on('plan_type')->onDelete('cascade')->onUpdate('cascade')->name('fk_plan_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
