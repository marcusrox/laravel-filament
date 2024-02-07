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
        Schema::create('contas_pagar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('valor_conta');
            $table->date('data_emissao');
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->bigInteger('valor_pagamento')->nullable();
            $table->string('codigo_barras');
            $table->string('instrucoes_pagamento');
            $table->foreignId('conta_corrente_id')->nullable()->constrained('contas_correntes');
            $table->string('cpf_cnpj_favorecido');
            $table->string('nome_favorecido');
            $table->foreignId('centro_custo_id')->constrained('centros_custo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas_pagar');
    }
};
