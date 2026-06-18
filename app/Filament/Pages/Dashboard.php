<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LatestInquiriesWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = -1;

    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            LatestInquiriesWidget::class,
        ];
    }

    public function getColumns(): int|string|array
    {
        return 2;
    }
}
