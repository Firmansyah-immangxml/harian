<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Kode Produk')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),

                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(100),

                FileUpload::make('image')
                    ->label('Gambar Produk')
                    ->image()
                    ->directory('products')
                    ->disk('public')
                    ->visibility('public')
                    ->required(),

                TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),

                TextInput::make('stock')
                    ->label('Stok')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}