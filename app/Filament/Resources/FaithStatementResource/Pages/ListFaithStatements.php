<?php

namespace App\Filament\Resources\FaithStatementResource\Pages;

use App\Filament\Resources\FaithStatementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaithStatements extends ListRecords
{
    protected static string $resource = FaithStatementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
