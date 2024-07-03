<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Forms\Components\Money;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Rodrigofs\FilamentMaskInput\Components\MaskInput;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Produtos';
    protected static ?string $navigationGroup = "Cadastros";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo')
                    ->maxLength(50),
                Forms\Components\TextInput::make('ncm')
                    ->maxLength(50),
                Forms\Components\TextInput::make('nome')
                    ->reactive() // <<---- IMPORTANTE
                    ->afterStateUpdated(function ($state, $set) {
                        $set('slug', Str::slug($state));
                    })
                    ->live(onBlur: true)
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome_curto')
                    ->maxLength(50),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('fornecedor_id')
                    ->relationship('fornecedor', 'nome')
                    ->searchable()
                    ->preload()
                    ->required(),
                // Forms\Components\TextInput::make('preco_custo')1
                //     ->label('Preço de Custo')
                //     //->mask(RawJs::make('$money($input,  \',\')'))
                //     ->mask(RawJs::make('$money($input)'))
                //     ->prefix('R$')
                //     ->required(),
                MaskInput::make('preco_custo')
                    ->label('Preço de Custo')
                    ->money()
                    ->prefix('R$')
                    ->required(),
                Forms\Components\TextInput::make('preco_venda')
                    ->label('Preço de Venda')
                    ->mask(RawJs::make('$money($input,  \',\')'))
                    ->prefix('R$')
                    ->required(),
                Forms\Components\TextInput::make('preco_venda_min')
                    ->label('Preço Mínimo de Venda')
                    ->mask(RawJs::make('$money($input,  \',\')'))
                    ->prefix('R$')
                    ->required(),
                // Forms\Components\TextInput::make('preco_custo')
                //     ->required()
                //     ->mask('money')
                //     ->numeric()
                //     ->prefix('R$')
                //     ->maxValue(42949672.95),
                Forms\Components\TextInput::make('peso_liquido')
                    ->numeric(),

                Forms\Components\TextInput::make('qtd_estoque')
                    ->numeric(),
                Forms\Components\TextInput::make('qtd_estoque_min')
                    ->numeric(),
                Forms\Components\TextInput::make('caixa_master')
                    ->numeric(),
                Forms\Components\TextInput::make('medida_caixa_master')
                    ->numeric(),

                Forms\Components\Radio::make('ativo')
                    ->boolean()
                    ->default(true)
                    ->inline()
                    ->inlineLabel(false),
                // Forms\Components\Select::make('categories')
                //     ->multiple()
                //     ->preload()
                //     ->relationship('categories', 'name'),

                Forms\Components\Select::make('categorias')
                    ->relationship('categorias', 'nome')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nome')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('foto')
                    ->image() // faz validação se upload é imagem
                    ->directory('produtos'), // Directory dentro de public
                Forms\Components\TextInput::make('descricao_detalhada')
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('id')->sortable()->label('ID'),
                Tables\Columns\TextColumn::make('nome')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco_custo')->label('Preço de Custo')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('qtd_estoque')
                    ->numeric()
                    ->sortable(),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //CategoriesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}
