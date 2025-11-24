<?php

namespace App\Filament\Resources\FaithCategoryResource\Pages;

use App\Filament\Resources\FaithCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaithCategory extends EditRecord
{
    protected static string $resource = FaithCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
