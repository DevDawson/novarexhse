<?php

if (!function_exists('theme_view')) {
    function theme_view(string $view, array $data = [], string $mergeData = '')
    {
        // Primary: DB setting (cached 300s). Fallback: env var, then config default.
        try {
            $theme = \App\Services\SettingsService::get('active_theme', '')
                ?: env('ACTIVE_THEME', config('theme.active', 'saas'));
        } catch (\Throwable $e) {
            $theme = env('ACTIVE_THEME', config('theme.active', 'saas'));
        }

        $theme  = in_array($theme, ['saas', 'classic']) ? $theme : 'saas';
        $target = "themes.{$theme}.{$view}";

        if (!view()->exists($target)) {
            $target = $view;
        }

        return view($target, $data);
    }
}
