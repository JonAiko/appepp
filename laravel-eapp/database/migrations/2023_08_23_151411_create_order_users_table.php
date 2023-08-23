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
        Schema::create('order_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordusUser_id');
            $table->unsignedBigInteger('ordusOrder_id');
            $table->foreign('ordusUser_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ordusOrder_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_users');
        Schema::table('order_users', function (Blueprint $table) {
            $table->dropForeign(['ordusUser_id','ordusOrder_id']);
            $table->dropColumn('ordusUser_id');
            $table->dropColumn('ordusOrder_id');
        });
    }
};
