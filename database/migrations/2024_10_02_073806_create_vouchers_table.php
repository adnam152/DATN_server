<?php

use App\Models\Voucher;
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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('discount_type',  Voucher::DISCOUNT_TYPE);
            $table->double('discount_value');
            $table->double('min_order_value');
            $table->double('max_discount_value');
            $table->integer('usage_limit');
            $table->integer('usage_count');
            $table->enum('status', Voucher::STATUS);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->foreignId('created_by')->constrained('accounts');
            $table->foreignId('updated_by')->constrained('accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
