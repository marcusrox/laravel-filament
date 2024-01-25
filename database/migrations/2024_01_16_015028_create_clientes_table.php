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

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('razao_social');
            $table->enum('tipo_pessoa', ['F', 'J']);
            $table->string('cpf_cnpj');
            $table->string('inscricao_estadual')->nullable();
            $table->string('end_endereco')->nullable();
            $table->string('end_numero')->nullable();
            $table->string('end_complemento')->nullable();
            $table->string('end_bairro')->nullable();
            $table->string('end_cep')->nullable();
            $table->string('end_uf')->nullable();
            $table->foreignId('end_cidade_id')->constrained('cidades')->cascadeOnDelete()->nullable();

            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();

            $table->string('end_cob_endereco')->nullable();
            $table->string('end_cob_numero')->nullable();
            $table->string('end_cob_complemento')->nullable();
            $table->string('end_cob_bairro')->nullable();
            $table->string('end_cob_cep')->nullable();
            $table->string('end_cob_uf')->nullable();
            $table->foreignId('end_cob_cidade_id')->constrained('cidades')->cascadeOnDelete()->nullable();

            $table->string('nome_contato_cobranca')->nullable();
            $table->string('email_cobranca')->nullable();
            $table->string('telefone_cobranca')->nullable();
            $table->string('celular_cobranca')->nullable();

            $table->boolean('bloqueado')->default(0);
            $table->string('motivo_bloqueio')->nullable();
            $table->unsignedInteger('vl_limite_credito')->nullable();

            $table->string('email');
            $table->string('telefone');
            $table->string('celular');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
