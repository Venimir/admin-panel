<?php

namespace App\Filament\Resources\AddTemplatesResource\Pages;

use App\Filament\Resources\AddTemplatesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAddTemplates extends EditRecord
{
    protected static string $resource = AddTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
