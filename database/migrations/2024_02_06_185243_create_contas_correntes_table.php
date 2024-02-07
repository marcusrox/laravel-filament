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
        Schema::create('contas_correntes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('banco_id')->nullable()->constrained('bancos');
            $table->string('numero_agencia')->nullable();
            $table->string('dv_agencia')->nullable();
            $table->string('numero_conta');
            $table->string('dv_conta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas_correntes');
    }
};
