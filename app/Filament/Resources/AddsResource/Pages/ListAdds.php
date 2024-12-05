<?php

namespace App\Filament\Resources\AddsResource\Pages;

use App\Filament\Resources\AddsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdds extends ListRecords
{
    protected static string $resource = AddsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
