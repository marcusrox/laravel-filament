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
        Schema::create('vendedores', function (Blueprint $table) {
            $table->string('nome');
            $table->string('razao_social')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->bigInteger('comissao')->default(0);

            $table->string('end_endereco')->nullable();
            $table->string('end_numero')->nullable();
            $table->string('end_complemento')->nullable();
            $table->string('end_bairro')->nullable();
            $table->string('end_cep')->nullable();
            $table->foreignId('end_uf_id')->nullable()->constrained('ufs')->cascadeOnDelete();
            $table->foreignId('end_cidade_id')->nullable()->constrained('cidades')->cascadeOnDelete();

            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('dados_bancarios')->nullable();

            $table->boolean('ativo');

            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
