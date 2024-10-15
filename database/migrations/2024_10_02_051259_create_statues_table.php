<?php

use App\Models\Status;
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
        Schema::create('statues', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->morphs('statusable');  // Tạo ra cột statusable_type và statusable_id            // Loại đối tượng (Product, Order, v.v.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statues');
    }
};
