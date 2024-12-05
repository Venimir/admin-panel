<?php

namespace App\Filament\Resources\AddTemplatesResource\Pages;

use App\Filament\Resources\AddTemplatesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAddTemplates extends ListRecords
{
    protected static string $resource = AddTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
