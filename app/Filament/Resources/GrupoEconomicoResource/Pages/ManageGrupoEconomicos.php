<?php

namespace App\Filament\Resources\GrupoEconomicoResource\Pages;

use App\Filament\Resources\GrupoEconomicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGrupoEconomicos extends ManageRecords
{
    protected static string $resource = GrupoEconomicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
