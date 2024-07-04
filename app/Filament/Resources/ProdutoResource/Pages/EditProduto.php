<?php

namespace App\Filament\Resources\ProdutoResource\Pages;

use App\Filament\Resources\ProdutoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use function Filament\Support\format_money;
use function Filament\Support\format_number;

class EditProduto extends EditRecord
{
    protected static string $resource = ProdutoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['preco_custo'] = format_number($data['preco_custo'], 2);
        $data['preco_venda'] = format_number($data['preco_venda'], 2);
        $data['preco_venda_min'] = format_number($data['preco_venda_min'], 2);
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['preco_custo'] = str_replace(['.', ','], ['', '.'], $data['preco_custo']);
        $data['preco_venda'] = str_replace(['.', ','], ['', '.'], $data['preco_venda']);
        $data['preco_venda_min'] = str_replace(['.', ','], ['', '.'], $data['preco_venda_min']);
        return $data;
    }
}
