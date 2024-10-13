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
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('pay_method_id')->unsigned();
            $table->bigInteger('plan_type_id')->unsigned();
            $table->date('created_at')->nullable()->default(DB::raw('CURRENT_DATE')); // Usar DB::raw para evitar error
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });

        Schema::table('payment', function (Blueprint $table) {
            $table->foreign(['pay_method_id'], 'fk_pay_method')->references(['id'])->on('pay_method')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['plan_type_id'], 'fk_plan_type')->references(['id'])->on('plan_type')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'fk_user')->references(['id'])->on('user')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropForeign('fk_pay_method');
            $table->dropForeign('fk_plan_type');
            $table->dropForeign('fk_user');
        });

        Schema::dropIfExists('payment');
    }
};
