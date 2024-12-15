<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade'); // Relasi ke restoran
            $table->string('name');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('menus');
    }
};
