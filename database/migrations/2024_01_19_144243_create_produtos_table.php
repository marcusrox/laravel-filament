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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nome')->unique();
            $table->string('nome_curto')->unique()->nullable();
            $table->string('ncm')->unique()->nullable();
            $table->string('slug');
            $table->foreignId('fornecedor_id')->nullable()->constrained('fornecedores')->cascadeOnDelete();

            $table->integer('preco_custo');
            $table->integer('preco_venda');
            $table->integer('preco_venda_min');
            $table->integer('qtd_estoque')->default(0);
            $table->integer('qtd_estoque_min')->default(0);

            $table->integer('caixa_master')->default(0);
            $table->integer('medida_caixa_master')->default(0);
            $table->integer('peso_liquido')->default(0);

            $table->boolean('ativo')->default(true);

            $table->string('foto')->nullable();
            $table->string('descricao_detalhada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
