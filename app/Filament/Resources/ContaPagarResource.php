<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContaPagarResource\Pages;
use App\Filament\Resources\ContaPagarResource\RelationManagers;
use App\Models\ContaPagar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
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

    protected static ?string $label = "conta a pagar";
    protected static ?string $pluralLabel = "contas a pagar";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('valor_conta')
                    ->label('Valor da Conta')
                    ->mask(RawJs::make('$money($input,  \',\')'))
                    ->prefix('R$')
                    ->required(),
                Forms\Components\DatePicker::make('data_emissao')
                    ->required()
                    ->maxDate(now()),
                Forms\Components\DatePicker::make('data_vencimento')
                    ->required()
                    ->maxDate(now()),
                Forms\Components\DatePicker::make('data_pagamento')
                    ->required()
                    ->maxDate(now()),
                Forms\Components\TextInput::make('valor_pagamento')
                    ->label('Valor Pagamento')
                    ->mask(RawJs::make('$money($input,  \',\')'))
                    ->prefix('R$')
                    ->required(),
                Forms\Components\TextInput::make('codigo_barras')
                    ->label('Código de Barras')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instrucoes_pagamento')
                    ->label('Instruções de pagamento')
                    ->maxLength(255),
                Forms\Components\Select::make('conta_corrente_id')
                    ->relationship('conta_corrente', 'nome')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('centro_custo_id')
                    ->relationship('centro_custo', 'nome')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('cpf_cnpj_favorecido')
                    ->label('CPF/CNPJ do Favorecido')
                    ->mask(RawJs::make(<<<'JS'
                                    ($input.length <= 14) ? '999.999.999-99' : '99.999.999/9999-99'
                                JS))
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('nome_favorecido')
                    ->label('Nome do Favorecido')
                    ->maxLength(255),
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
