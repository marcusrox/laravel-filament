<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransportadoraResource\Pages;
use App\Filament\Resources\TransportadoraResource\RelationManagers;
use App\Models\Transportadora;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransportadoraResource extends Resource
{
    protected static ?string $model = Transportadora::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Transportadoras';
    protected static ?string $navigationGroup = "Cadastros";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações da Transportadora')
                    ->columns(2)
                    ->description('Dados cadastrais da Transportadora')
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
                            //->mask('999.999.999-99')
                            ->mask(RawJs::make(<<<'JS'
                                    ($input.length <= 14) ? '999.999.999-99' : '99.999.999/9999-99'
                                JS))
                            ->required()
                            ->maxLength(20),
                        Forms\Components\Radio::make('ativo')
                            ->boolean()
                            ->default(true)
                            ->inline()
                            ->inlineLabel(false),
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

                        Forms\Components\TextInput::make('nome_contato')
                            ->label('Nome Pessoa Contato')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telefone')
                            ->tel()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('celular')
                            ->tel()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('site')
                            ->label('Site')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->maxLength(255),
                    ]),
                Forms\Components\TextInput::make('condicoes_transporte')
                    ->label('Condições de Transporte')
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')->searchable()->sortable()->label('ID'),
                Tables\Columns\TextColumn::make('nome')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('cpf_cnpj')->searchable()->sortable()->label('CPF/CNPJ'),
                Tables\Columns\TextColumn::make('telefone')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ManageTransportadoras::route('/'),
        ];
    }
}
