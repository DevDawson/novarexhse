<?php

namespace App\Filament\Pages;

use App\Models\AnalyticsEvent;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class AnalyticsPage extends Page
{
    protected static ?string $navigationIcon  = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Analytics';
    protected static ?string $navigationGroup = 'Site';
    protected static ?int    $navigationSort  = 6;
    protected static string  $view            = 'filament.pages.analytics';

    public array $stats     = [];
    public array $topPages  = [];

    public function mount(): void
    {
        $base = AnalyticsEvent::where('event_type', 'page_view');

        $this->stats = [
            'total'       => (clone $base)->count(),
            'today'       => (clone $base)->whereDate('created_at', today())->count(),
            'this_week'   => (clone $base)->where('created_at', '>=', now()->startOfWeek())->count(),
            'this_month'  => (clone $base)->where('created_at', '>=', now()->startOfMonth())->count(),
            'unique'       => (clone $base)->distinct('ip_hash')->count('ip_hash'),
            'link_clicks' => AnalyticsEvent::where('event_type', 'link_click')->count(),
        ];

        $this->topPages = (clone $base)
            ->select('path', DB::raw('COUNT(*) as views'))
            ->groupBy('path')
            ->orderByDesc('views')
            ->limit(20)
            ->get()
            ->toArray();
    }
}
