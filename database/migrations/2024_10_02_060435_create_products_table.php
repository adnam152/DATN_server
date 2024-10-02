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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('thumbnail');
            $table->text('description');
            $table->string('short_description');
            $table->foreignId('catalogue_id')->constrained('catalogues');
            $table->foreignId('brand_id')->constrained('brands');
            $table->integer('sale_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->integer('wish_count')->default(0);
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
        Schema::dropIfExists('products');
    }
};
