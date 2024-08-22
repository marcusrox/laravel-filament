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
        //$data['preco_custo'] = number_format($data['preco_custo'], 2, ',');
        //$data['preco_venda'] = number_format($data['preco_venda'], 2, ',');
        //$data['preco_venda_min'] = number_format($data['preco_venda_min'], 2, ',');
        //dd($data);
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        //$data['preco_custo'] = str_replace(['.', ','], ['', '.'], $data['preco_custo']);
        //$data['preco_venda'] = str_replace(['.', ','], ['', '.'], $data['preco_venda']);
        //$data['preco_venda_min'] = str_replace(['.', ','], ['', '.'], $data['preco_venda_min']);
        //dd($data);
        return $data;
    }
}
