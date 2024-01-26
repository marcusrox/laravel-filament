<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendedorResource\Pages;
use App\Models\Vendedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class VendedorResource extends Resource
{
    protected static ?string $model = Vendedor::class;
    protected static ?string $slug = "vendedores";
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = "Vendedores";
    protected static ?string $label = "vendedor";
    protected static ?string $pluralLabel = "vendedores";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do Vendedor')
                    ->columns(2)
                    ->description('Dados cadastrais do Vendedor')
                    ->collapsible()
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        Forms\Components\TextInput::make('nome')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('razao_social')
                            ->label('Razão Social')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cpf_cnpj')
                            ->label('CPF/CNPJ')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('comissao')
                            ->numeric(),
                        Forms\Components\TextInput::make('dados_bancarios')
                    ]),
                Forms\Components\Section::make('Informações de contato')
                    ->columns(2)
                    ->description('Endereço e contato')
                    ->collapsible()
                    ->collapsed()
                    ->icon('heroicon-m-building-storefront')
                    ->schema([
                        Forms\Components\TextInput::make('end_endereco')
                            ->label('Endereço')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('end_numero')
                            ->label('Número')
                            ->maxLength(10),
                        Forms\Components\TextInput::make('end_complemento')
                            ->label('Complemento')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('end_bairro')
                            ->label('Bairro')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('end_cep')
                            ->label('CEP')
                            ->maxLength(9),
                        Forms\Components\Select::make('end_uf_id')
                            ->label('UF')
                            ->relationship('uf', 'nome')
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('end_cidade_id')
                            ->label('Cidade')
                            ->relationship('cidade', 'nome')
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('telefone')
                            ->tel(),
                        Forms\Components\TextInput::make('celular')
                            ->tel(),
                    ]),
                Forms\Components\Select::make('user_id')
                    ->label('Usuário')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nome')->searchable()->sortable(),
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
            'index' => Pages\ListVendedores::route('/'),
            'create' => Pages\CreateVendedor::route('/create'),
            'edit' => Pages\EditVendedor::route('/{record}/edit'),
        ];
    }
}
