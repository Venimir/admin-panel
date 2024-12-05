<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddTemplatesResource\Pages;
use App\Filament\Resources\AddTemplatesResource\RelationManagers;
use App\Models\AddTemplates;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddTemplatesResource extends Resource
{
    protected static ?string $model = AddTemplates::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\TextInput::make('canva_url'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn ::make('title')->searchable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('canva_url'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('add.title'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddTemplates::route('/'),
            'create' => Pages\CreateAddTemplates::route('/create'),
            'edit' => Pages\EditAddTemplates::route('/{record}/edit'),
        ];
    }
}
