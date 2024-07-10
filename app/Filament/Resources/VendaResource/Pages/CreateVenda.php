<?php

namespace App\Filament\Resources\VendaResource\Pages;

use App\Filament\Resources\VendaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVenda extends CreateRecord
{
    protected static string $resource = VendaResource::class;

    protected function beforeCreate()
    {
        // Runs before the form fields are saved to the database.
        $formData = $this->data;
        //dd($formData);
    }
}
