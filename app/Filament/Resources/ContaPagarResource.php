<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContaPagarResource\Pages;
use App\Filament\Resources\ContaPagarResource\RelationManagers;
use App\Models\ContaPagar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContaPagarResource extends Resource
{
    protected static ?string $model = ContaPagar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Contas a Pagar';
    protected static ?string $navigationGroup = "Financeiro";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContasPagar::route('/'),
            'create' => Pages\CreateContaPagar::route('/create'),
            'edit' => Pages\EditContaPagar::route('/{record}/edit'),
        ];
    }
}
