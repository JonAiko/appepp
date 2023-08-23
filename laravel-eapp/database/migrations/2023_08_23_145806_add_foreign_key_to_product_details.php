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
        Schema::table('product_details', function (Blueprint $table) {
            $table->unsignedBigInteger('prodeSize_id');
            $table->unsignedBigInteger('prodeStatus_id');
            $table->foreign('prodeSize_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('prodeStatus_id')->references('id')->on('product_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->dropForeign(['prodeSize_id','prodeStatus_id']);
            $table->dropColumn('prodeSize_id');
            $table->dropColumn('prodeStatus_id');
        });
    }
};
