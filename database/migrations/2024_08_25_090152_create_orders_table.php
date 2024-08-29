<?php

use App\Constants\Order\OrderStatusEnum;
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
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('transaction_id')->nullable();
            $table->foreignId('plan_id')->references('id')->on('plans');
            $table->integer('price');
            $table->enum('status', [
                OrderStatusEnum::PENDING->value,
                OrderStatusEnum::DONE->value,
                OrderStatusEnum::CANCELED->value,
            ])->nullable();
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
