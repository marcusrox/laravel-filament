<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->placeholder('Nome completo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email address')
                    ->autocomplete(false)
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->autocomplete(false)
                    ->required(fn (string $context): bool => $context === 'create') // Só vai exisgir preenchimento se for na criação
                    ->dehydrated(fn ($state) => filled($state)), // Na edição, se campo não fornenecido, não vai alterar pra vazio
            // Forms\Components\Toggle::make('active')
            //     ->label('Ativo?')
            //     ->inline()
            //     ->inlineLabel(false)
            //     ->default(true),
                Forms\Components\Radio::make('active')
                    ->boolean()
                    ->default(true)
                    ->inline()
                    ->inlineLabel(false),
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')->label('Foto')->circular(),
                Tables\Columns\TextColumn::make('id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
                //Tables\Columns\IconColumn::make('active')->boolean(),
                Tables\Columns\ToggleColumn::make('active')->label('Active')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                ])
            ->filters([
                //Tables\Filters\Filter::make('active')->default(true),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
    
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('Desativar')
                        //->icon('heroicon-o-ban')
                        ->icon('heroicon-m-arrow-small-down')
                        ->requiresConfirmation()
                        ->action(fn(Collection $users) => $users->each->update(['active' => false]))
                        ->after(fn() => Notification::make()
                            ->title('Desativação em lote concluída')
                            ->success()
                            ->send()
                        )
                        
                ]),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
