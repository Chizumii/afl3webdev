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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_user_id')->constrained('order_users')->onDelete('cascade');
            $table->foreignId('menu_date_id')->constrained('menu_dates')->onDelete('cascade');
            $table->foreignId('delivery_status_id')->constrained('delivery_statuses')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->integer('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');

        
    }
};