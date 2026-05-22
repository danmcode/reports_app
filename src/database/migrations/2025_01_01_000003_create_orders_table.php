<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('OrderId')->primary();
            $table->integer('ClientId');
            $table->integer('ProductId');
            $table->integer('Quantity')->nullable();
            $table->decimal('Total', 15, 2)->nullable();

            $table->foreign('ClientId')
                ->references('ClientId')
                ->on('clients');

            $table->foreign('ProductId')
                ->references('ProductId')
                ->on('products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
