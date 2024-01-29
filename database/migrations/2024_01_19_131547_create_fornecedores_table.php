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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('razao_social');
            $table->string('cpf_cnpj')->nullable();

            $table->string('end_endereco')->nullable();
            $table->string('end_numero')->nullable();
            $table->string('end_complemento')->nullable();
            $table->string('end_bairro')->nullable();
            $table->string('end_cep')->nullable();
            $table->string('end_cidade')->nullable();
            $table->string('end_uf')->nullable();
            $table->string('end_pais')->nullable();

            $table->string('nome_contato')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();

            $table->string('condicoes_pagamento')->nullable();
            $table->string('condicoes_entrega')->nullable();

            $table->boolean('ativo')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
