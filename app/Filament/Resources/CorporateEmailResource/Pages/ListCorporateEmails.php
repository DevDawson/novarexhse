<?php

namespace App\Filament\Resources\CorporateEmailResource\Pages;

use App\Filament\Resources\CorporateEmailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCorporateEmails extends ListRecords
{
    protected static string $resource = CorporateEmailResource::class;
    protected function getHeaderActions(): array { return [CreateAction::make()]; }
}
