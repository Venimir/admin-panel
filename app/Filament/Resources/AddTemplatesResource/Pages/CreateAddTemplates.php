<?php

namespace App\Filament\Resources\AddTemplatesResource\Pages;

use App\Filament\Resources\AddTemplatesResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateAddTemplates extends CreateRecord
{
    protected static string $resource = AddTemplatesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
