<?php

namespace App\Filament\Resources\ProfileLinkResource\Pages;

use App\Filament\Resources\ProfileLinkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfileLink extends EditRecord
{
    protected static string $resource = ProfileLinkResource::class;
    protected function getHeaderActions(): array { return [DeleteAction::make()]; }
}
