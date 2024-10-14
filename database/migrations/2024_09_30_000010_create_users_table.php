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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('username', 255);
            $table->string('password', 255);
            $table->char('phone', 10)->nullable();
            $table->timestamp('username_verified_at')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('status_id', 'fk_status')
                  ->references('id')->on('status')
                  ->onUpdate('no action')
                  ->onDelete('no action');
        });
        /*
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        */
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();

            $table->foreign('user_id', 'fk_status')
                  ->references('id')->on('user')
                  ->onUpdate('no action')
                  ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
