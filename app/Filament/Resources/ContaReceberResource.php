<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContaReceberResource\Pages;
use App\Filament\Resources\ContaReceberResource\RelationManagers;
use App\Models\ContaReceber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContaReceberResource extends Resource
{
    protected static ?string $model = ContaReceber::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-right-end-on-rectangle';

    protected static ?string $navigationLabel = 'Contas a Receber';
    protected static ?string $navigationGroup = "Financeiro";

    protected static ?string $label = "conta a receber";
    protected static ?string $pluralLabel = "contas a receber";

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
            'index' => Pages\ListContasReceber::route('/'),
            'create' => Pages\CreateContaReceber::route('/create'),
            'edit' => Pages\EditContaReceber::route('/{record}/edit'),
        ];
    }
}
