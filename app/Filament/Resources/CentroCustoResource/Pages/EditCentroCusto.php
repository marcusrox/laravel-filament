<?php

namespace App\Filament\Resources\CentroCustoResource\Pages;

use App\Filament\Resources\CentroCustoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCentroCusto extends EditRecord
{
    protected static string $resource = CentroCustoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
