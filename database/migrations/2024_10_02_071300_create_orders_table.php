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
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone_number');
            $table->string('customer_address');
            $table->string('note')->nullable();
            $table->foreignId('payment_id')->constrained('payments');
            $table->string('status');
            $table->boolean('is_paid')->default(false);
            $table->integer('quantity');
            $table->integer('voucher_discount');
            $table->integer('total_price');
            $table->foreignId('updated_by')->constrained('admin_accounts');
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
