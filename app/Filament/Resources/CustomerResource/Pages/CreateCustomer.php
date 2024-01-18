<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return 
            Notification::make()
            ->success()
            ->title('Novo cliente')
            ->body('O novo cliente foi cadastrado com sucesso!')
            ->sendToDatabase(\auth()->user());
    }
}
