<?php

namespace App\Filament\Resources\CorporateEmailResource\Pages;

use App\Filament\Resources\CorporateEmailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCorporateEmail extends EditRecord
{
    protected static string $resource = CorporateEmailResource::class;
    protected function getHeaderActions(): array { return [DeleteAction::make()]; }
}
