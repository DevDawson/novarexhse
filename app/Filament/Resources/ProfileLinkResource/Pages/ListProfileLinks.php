<?php

namespace App\Filament\Resources\ProfileLinkResource\Pages;

use App\Filament\Resources\ProfileLinkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfileLinks extends ListRecords
{
    protected static string $resource = ProfileLinkResource::class;
    protected function getHeaderActions(): array { return [CreateAction::make()]; }
}
