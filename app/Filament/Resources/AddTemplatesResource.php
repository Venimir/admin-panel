<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddTemplatesResource\Pages;
use App\Filament\Resources\AddTemplatesResource\RelationManagers;
use App\Models\AddTemplates;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\Page;

class AddTemplatesResource extends Resource
{
    protected static ?string $model = AddTemplates::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->unique(ignoreRecord: true)->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\TextInput::make('canva_url')->activeUrl(),
                Forms\Components\Select::make('Adds')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn ::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('canva_url'),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\TextColumn::make('add.title'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'active' => 'Active ',
                        'archived' => 'Archived',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'view' => Pages\ViewAddTemplates::route('/{record}'),
            'edit' => Pages\EditAddTemplates::route('/{record}/edit'),
        ];
    }
}
