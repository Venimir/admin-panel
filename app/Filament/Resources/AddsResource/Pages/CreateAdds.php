<?php

namespace App\Filament\Resources\AddsResource\Pages;

use App\Filament\Resources\AddsResource;
use App\Models\Adds;
use App\Services\AddTemplateService;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

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

    protected function handleRecordCreation(array $data): Model
    {
        $add = static::getModel()::create($data);
        $add->createTemplate = $data['create-template'];

        return $add;
    }

    public function afterCreate() :void
    {
        /** @var Adds $add */
        $add = $this->getRecord();

        if (isset($add->createTemplate) &&  $this->addTemplateService->createTemplate($add)) {
           $add->update(['status' => 'completed']);
        }

    }


}
