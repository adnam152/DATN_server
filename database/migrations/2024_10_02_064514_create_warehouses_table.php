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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id')->constrained('variants');
            $table->double('input_price', 8, 2);
            $table->unsignedBigInteger('stock');
            $table->foreignId('created_by')->constrained('admin_accounts');
            $table->foreignId('updated_by')->constrained('admin_accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};