<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Resources\ClienteResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCliente extends CreateRecord
{
    protected static string $resource = ClienteResource::class;

    protected function getCreatedNotification(): ?Notification
    {

        return
            Notification::make()
            ->success()
            ->title('Novo cliente')
            ->body('O novo cliente foi cadastrao com sucesso!')
            ->sendToDatabase(\auth()->user());
    }
}
