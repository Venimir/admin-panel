<?php

namespace App\Filament\Resources\AddTemplatesResource\Pages;

use App\Filament\Resources\AddTemplatesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAddTemplates extends ViewRecord
{
    protected static string $resource = AddTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
