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
        Schema::create('data_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daoProduct_id');
            $table->unsignedBigInteger('daoOrder_id');
            $table->unsignedInteger('quantity');
            $table->foreign('daoProduct_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('daoOrder_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_orders');
        Schema::table('data_orders', function (Blueprint $table) {
            $table->dropForeign(['daoProduct_id','daoOrder_id']);
            $table->dropColumn('daoProduct_id');
            $table->dropColumn('daoOrder_id');
        });
    }
};
