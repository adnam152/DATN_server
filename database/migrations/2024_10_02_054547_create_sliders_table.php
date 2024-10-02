<?php

use App\Models\Slider;
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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->default('');
            $table->enum('page', array_values(Slider::PAGE));
            $table->string('width');
            $table->string('height');
            $table->enum('object_fit', array_values(Slider::OBJECT_FIT));
            $table->integer('delay')->unsigned();
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('sliders');
    }
};
