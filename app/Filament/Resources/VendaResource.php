<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendaResource\Pages;
use App\Filament\Resources\VendaResource\RelationManagers;
use App\Models\Cliente;
use App\Models\Venda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendaResource extends Resource
{
    protected static ?string $model = Venda::class;

    protected static ?int $sort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('vendedor_id')
                    ->label('Vendedor')
                    ->relationship(
                        'vendedor',
                        'nome',
                        modifyQueryUsing: function (Builder $query) {
                            /** @var \App\Models\User */
                            $user = auth()->user();
                            if ($user->is_vendedor()) {
                                $query->where('id', $user->vendedor->id);
                            }
                        },
                    )
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('cliente_id')
                    ->label('Cliente')
                    ->relationship(
                        name: 'cliente',
                        modifyQueryUsing: function (Builder $query) {
                            /** @var \App\Models\User */
                            $user = auth()->user();
                            if ($user->is_vendedor()) {
                                $query->where('vendedor_id', $user->vendedor->id);
                            }
                        },
                    )
                    ->getOptionLabelFromRecordUsing(fn (Cliente $record) => "{$record->cpf_cnpj} - {$record->nome}")
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('tipo_frete')->options(Venda::opt_tipo_frete),
                Forms\Components\Select::make('natureza_operacao')->options(Venda::opt_natureza_operacao),
                Forms\Components\Textarea::make('observacao'),
                Forms\Components\TextInput::make('numero_pedido'),
                Forms\Components\TextInput::make('pct_comissao')->numeric()->maxValue(100),
                Forms\Components\TextInput::make('pct_vpc')->numeric()->maxValue(100),
                Forms\Components\TextInput::make('prazos_pagamento'),
                Forms\Components\Select::make('transportadora_id')
                    ->relationship('transportadora', 'nome')
                    ->searchable()
                    ->preload(),
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
            'index' => Pages\ListVendas::route('/'),
            'create' => Pages\CreateVenda::route('/create'),
            'edit' => Pages\EditVenda::route('/{record}/edit'),
        ];
    }
}
