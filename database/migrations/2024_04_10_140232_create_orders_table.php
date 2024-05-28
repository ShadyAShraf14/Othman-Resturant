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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('date');
            $table->string('time');
            $table->string('phone');
            
            
            $table->integer('meal_id');
            $table->integer('small_meal')->default(0);
            $table->integer('medium_meal')->default(0);
            $table->integer('large_meal')->default(0);

            $table->text('body');
            $table->string('status')->default('pending');
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
