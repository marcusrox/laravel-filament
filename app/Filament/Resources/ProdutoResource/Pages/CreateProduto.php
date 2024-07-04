<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Filament\Resources\ProdutoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduto extends CreateRecord
{
    protected static string $resource = ProdutoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['preco_custo'] = str_replace(['.', ','], ['', '.'], $data['preco_custo']);
        $data['preco_venda'] = str_replace(['.', ','], ['', '.'], $data['preco_venda']);
        $data['preco_venda_min'] = str_replace(['.', ','], ['', '.'], $data['preco_venda_min']);
        return $data;
    }
}
