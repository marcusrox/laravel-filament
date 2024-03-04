<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContaCorrenteResource\Pages;
use App\Filament\Resources\ContaCorrenteResource\RelationManagers;
use App\Models\ContaCorrente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContaCorrenteResource extends Resource
{
    protected static ?string $model = ContaCorrente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = "contas-correntes";
    protected static ?string $navigationLabel = 'Contas Correntes';
    protected static ?string $navigationGroup = "Financeiro";

    protected static ?string $label = "conta corrente";
    protected static ?string $pluralLabel = "contas correntes";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nome')
                    ->label('Nome da Conta')
                    ->maxLength(255),
                Forms\Components\Select::make('banco_id')
                    ->relationship('banco', 'nome')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('numero_agencia')
                    ->maxLength(255),
                Forms\Components\TextInput::make('dv_agencia')
                    ->maxLength(2),
                Forms\Components\TextInput::make('numero_conta')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('dv_conta')
                    ->maxLength(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nome')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('banco.nome')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageContasCorrentes::route('/'),
        ];
    }
}
