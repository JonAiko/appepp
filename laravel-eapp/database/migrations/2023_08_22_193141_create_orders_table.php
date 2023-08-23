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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ordCode',30); //Codigo de ingreso
            $table->string('ordCodeDmc',30); //Codigo de Dynamics
            $table->string('ordCodeBdg',30); //Codigo de bodega
            $table->unsignedSmallInteger('ordTotal');//Cantidad total de items pedidos
            $table->unsignedTinyInteger('ordStatus')->default(0);//revisamos el estado del order 0:Sin Aprobar 1:Aprobado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
