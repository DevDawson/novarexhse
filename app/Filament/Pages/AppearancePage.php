<?php

namespace App\Filament\Pages;

use App\Services\SettingsService;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class AppearancePage extends Page
{
    protected static ?string $slug            = 'appearance';
    protected static ?string $navigationIcon  = 'heroicon-o-paint-brush';
    protected static ?string $navigationLabel = 'Appearance';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int    $navigationSort  = 2;
    protected static string  $view            = 'filament.pages.appearance-page';

    public string $activeTheme = 'saas';

    public function mount(): void
    {
        $this->activeTheme = SettingsService::get('active_theme', 'saas');
    }

    public function setTheme(string $theme): void
    {
        if (!in_array($theme, ['saas', 'classic'])) {
            return;
        }
        $this->activeTheme = $theme;
    }

    public function save(): void
    {
        SettingsService::set('active_theme', $this->activeTheme);

        Notification::make()
            ->title('Theme applied: ' . ucfirst($this->activeTheme))
            ->body('The public website is now using the ' . ($this->activeTheme === 'saas' ? 'SaaS — modern light design.' : 'Classic — original dark design.'))
            ->success()
            ->send();
    }
}
