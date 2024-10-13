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
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->bigInteger('card_id');
            $table->string('name')->nullable();
            $table->char('account_number', 16)->nullable();
            $table->char('cvv', 3)->nullable();
            $table->date('expiration_date')->nullable();
            $table->date('created_at')->nullable()->default(DB::raw('CURRENT_DATE')); // Corrección aquí
            $table->timestamp('updated_at')->nullable()->useCurrent();
            
            // Definición de claves foráneas
            $table->foreign('user_id')->references('id')->on('user')->onUpdate('no action')->onDelete('no action');
            $table->foreign('card_id')->references('id')->on('card')->onUpdate('no action')->onDelete('no action');
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
