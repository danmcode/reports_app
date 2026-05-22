<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('ClientId')->primary();
            $table->string('Name', 100)->nullable();
            $table->string('LastName', 100)->nullable();
            $table->string('Identification', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
