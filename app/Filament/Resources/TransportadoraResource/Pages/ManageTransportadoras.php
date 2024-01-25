<?php

namespace App\Filament\Resources\TransportadoraResource\Pages;

use App\Filament\Resources\TransportadoraResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTransportadoras extends ManageRecords
{
    protected static string $resource = TransportadoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
