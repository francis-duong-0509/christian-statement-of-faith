<?php

namespace App\Filament\Resources\FaithCategoryResource\Pages;

use App\Filament\Resources\FaithCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaithCategories extends ListRecords
{
    protected static string $resource = FaithCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
