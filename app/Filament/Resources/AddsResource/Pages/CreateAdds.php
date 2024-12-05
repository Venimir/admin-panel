<?php

namespace App\Filament\Resources\AddsResource\Pages;

use App\Filament\Resources\AddsResource;
use App\Services\AddTemplateService;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateAdds extends CreateRecord
{
    protected static string $resource = AddsResource::class;

    private AddTemplateService $addTemplateService;
    public function boot(): void
    {
        $this->addTemplateService = new AddTemplateService();
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }


    public function afterCreate() :void
    {
        $this->addTemplateService->createAddTemplate($this->getRecord());

    }
}
