<?php

namespace App\Filament\Resources\AddTemplatesResource\Pages;

use App\Filament\Resources\AddTemplatesResource;
use App\Models\Adds;
use App\Models\AddTemplates;
use App\Services\AddTemplateService;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\AddTemplatesResource\Pages;
use Filament\Forms\Components\Select;

class ListAddTemplates extends ListRecords
{
    protected static string $resource = AddTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Action::make('createTemplateFromAdd')
                ->form([
                    Select::make('addId')
                        ->label('Adds')
                        ->options(Adds::query()->pluck('title', 'id'))
                        ->required(),
                ])
                ->action(function (array $data): void {
                    $add = Adds::query()->where('id', $data['addId'])->first();
                    $service = new AddTemplateService();
                    $service->createTemplate($add);
                })
        ];
    }




}
