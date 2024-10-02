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
        Schema::create('variants_attribute_values', function (Blueprint $table) {
            $table->foreignId('variant_id')->constrained('variants');
            $table->foreignId('attribute_value_id')->constrained('attribute_values');
            $table->primary(['attribute_value_id', 'variant_id']);            
            $table->unique(['variant_id', 'attribute_value_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants_attribute_values');
    }
};
