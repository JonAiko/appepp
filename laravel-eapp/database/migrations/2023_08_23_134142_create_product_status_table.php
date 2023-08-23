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
        Schema::create('product_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('status'); // 0:abierto 1:sellado
            $table->date('expiration');//fecha de vencimiento del producto, solo si es necesario.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_status');
    }
};
