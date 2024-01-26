<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClienteResource extends Resource
{

    protected static ?string $model = Cliente::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Clientes';
    protected static ?string $navigationGroup = "Cadastros";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do Cliente')
                    ->columns(2)
                    ->description('Dados cadastrais do cliente')
                    ->collapsible()
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        Forms\Components\TextInput::make('nome')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('razao_social')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('tipo_pessoa')
                            ->options([
                                'J' => 'Jurídica',
                                'F' => 'Física',
                            ]),
                        Forms\Components\TextInput::make('cpf_cnpj')
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('inscricao_estadual')
                            ->maxLength(20),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telefone')
                            ->label('Telefone')
                            ->tel()
                            ->required(),
                        Forms\Components\Select::make('grupo_economico_id')
                            ->relationship('grupo_economico', 'nome')
                            ->searchable()
                            ->preload(),

                    ]),
                Forms\Components\Section::make('Informações comerciais')
                    ->columns(2)
                    ->description('Endereço e contatos comerciais')
                    ->collapsible()
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        Forms\Components\TextInput::make('end_endereco')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('end_numero')
                            ->maxLength(10),
                        Forms\Components\TextInput::make('end_complemento')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('end_bairro')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('end_cep')
                            ->maxLength(9),
                        Forms\Components\TextInput::make('end_uf')
                            ->maxLength(2),
                        Forms\Components\Select::make('end_cidade_id')
                            ->relationship('cidade', 'nome')
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nome')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('telefone')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
