<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()->icon('heroicon-m-user-group'),
            'active' => Tab::make()
                ->badge(User::query()->where('active', true)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('active', true)),
            'inactive' => Tab::make()
                ->badge(User::query()->where('active', false)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false)),
        ];
    }
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     dd($data);
    //     return $data;
    // }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    //$data['user_id'] = auth()->id();
                    //dd($data);
                    return $data;
                })
        ];
    }
}
