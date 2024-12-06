<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddsResource\Pages;
use App\Models\Adds;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AddsResource extends Resource
{
    protected static ?string $model = Adds::class;


    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Section::make()->schema([
                   Forms\Components\TextInput::make('title')->unique(ignoreRecord: true)->required(),
                   Forms\Components\Textarea::make('description'),
                   Forms\Components\TextInput::make('url')->required()->activeUrl(),
                   Forms\Components\Checkbox::make('create-template')->label('Create Template From Add')
               ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn ::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('status')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
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

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdds::route('/'),
            'create' => Pages\CreateAdds::route('/create'),
            'view' => Pages\ViewAdds::route('/{record}'),
            'edit' => Pages\EditAdds::route('/{record}/edit'),
        ];
    }
}
