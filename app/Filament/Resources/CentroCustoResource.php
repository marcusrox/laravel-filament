<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CentroCustoResource\Pages;
use App\Filament\Resources\CentroCustoResource\RelationManagers;
use App\Models\CentroCusto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CentroCustoResource extends Resource
{
    protected static ?string $model = CentroCusto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Centros de Custo';
    protected static ?string $navigationGroup = "Financeiro";

    protected static ?string $label = "centro de custo";
    protected static ?string $pluralLabel = "centros de custo";

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
                Tables\Columns\TextColumn::make('id')->sortable()->label('ID'),
                Tables\Columns\TextColumn::make('codigo')->searchable()->label('Código'),
                Tables\Columns\TextColumn::make('nome')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()
                    ->dateTime('d/m/Y H:i:s')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->sortable()
                    ->dateTime('d/m/Y H:i:s')
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCentroCustos::route('/'),
            'create' => Pages\CreateCentroCusto::route('/create'),
            'edit' => Pages\EditCentroCusto::route('/{record}/edit'),
        ];
    }
}
