<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\Uf;
use App\Models\Vendedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ClienteResource extends Resource
{

    protected static ?string $model = Cliente::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Clientes';
    protected static ?string $navigationGroup = "Cadastros";

    public static function form(Form $form): Form
    {
        /** @var \App\Models\User */
        $user = auth()->user();
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
                            ->label('Razão Social')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('tipo_pessoa')
                            ->options([
                                'J' => 'Jurídica',
                                'F' => 'Física',
                            ]),
                        Forms\Components\TextInput::make('cpf_cnpj')
                            ->label('CPF/CNPJ')
                            ->mask(RawJs::make(<<<'JS'
                                    ($input.length <= 14) ? '999.999.999-99' : '99.999.999/9999-99'
                                JS))
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('inscricao_estadual')
                            ->label('Insc. Estadual')
                            ->maxLength(20),
                        Forms\Components\Select::make('grupo_economico_id')
                            ->label('Grupo Econômico')
                            ->relationship('grupo_economico', 'nome')
                            ->searchable()
                            ->preload(),

                    ]),
                Forms\Components\Section::make('Informações comerciais')
                    ->columns(2)
                    ->description('Endereço e contatos comerciais')
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
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('end_cidade_id', null))
                            ->preload(),
                        Forms\Components\Select::make('end_cidade_id')
                            ->label('Cidade')
                            ->options(
                                fn (Get $get): Collection => Cidade::query()->where('uf_id', $get('end_uf_id'))->pluck('nome', 'id')
                            )
                            ->searchable()
                            ->live()
                            ->preload(),
                        Forms\Components\TextInput::make('nome_contato')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telefone')
                            ->tel(),
                        Forms\Components\TextInput::make('celular')
                            ->tel(),
                    ]),
                Forms\Components\Section::make('Informações financeiras')
                    ->columns(2)
                    ->description('Endereço e contatos financeiros')
                    ->collapsible()
                    ->collapsed()
                    ->icon('heroicon-m-banknotes')
                    ->schema([
                        Forms\Components\TextInput::make('nome_contato_cobranca')
                            ->label('Nome contato')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email_cobranca')
                            ->label('E-mail')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telefone_cobranca')
                            ->label('Telefone')
                            ->tel(),
                        Forms\Components\TextInput::make('celular_cobranca')
                            ->label('Celular')
                            ->tel(),
                    ]),
                Forms\Components\Select::make('vendedor_id')
                    ->visible(!$user->is_vendedor())
                    ->label('Vendedor')
                    ->relationship('vendedor', 'nome')
                    ->searchable()
                    ->preload(),
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

    public static function getEloquentQuery(): Builder
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        // if ($user->hasRole('Vendedor')) {
        //     // Se o usuário logado for um vendedor, fechar escopo de vendedores
        //     $vendedor = Vendedor::whereUserId($user->id)->first();
        //     dd($vendedor);
        //     return parent::getEloquentQuery()->where('vendedor_id', 1);
        // }

        return parent::getEloquentQuery();
    }
}
