<?php

namespace App\Filament\Widgets;

use App\Models\AnalyticsEvent;
use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalVisits  = AnalyticsEvent::where('event_type', 'page_view')->count();
        $todayVisits  = AnalyticsEvent::where('event_type', 'page_view')
            ->whereDate('created_at', today())
            ->count();
        $inquiries    = Inquiry::count();
        $unreadCount  = Inquiry::where('is_read', 0)->count();
        $posts        = Post::where('status', 'published')->count();
        $services     = Service::where('is_active', 1)->count();

        return [
            Stat::make('Total Page Views', number_format($totalVisits))
                ->description("Today: {$todayVisits}")
                ->color('info')
                ->icon('heroicon-o-eye'),
            Stat::make('Inquiries', $inquiries)
                ->description("{$unreadCount} unread")
                ->color($unreadCount > 0 ? 'danger' : 'success')
                ->icon('heroicon-o-envelope'),
            Stat::make('Published Posts', $posts)
                ->icon('heroicon-o-newspaper')
                ->color('primary'),
            Stat::make('Active Services', $services)
                ->icon('heroicon-o-briefcase')
                ->color('success'),
        ];
    }
}
