<?php

namespace App\Filament\Resources\ContaCorrenteResource\Pages;

use App\Filament\Resources\ContaCorrenteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageContasCorrentes extends ManageRecords
{
    protected static string $resource = ContaCorrenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
