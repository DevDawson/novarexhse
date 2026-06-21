<x-filament-panels::page>
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6 mb-8">
        @foreach ([
            ['label' => 'Total Views',   'value' => $this->stats['total']],
            ['label' => 'Today',          'value' => $this->stats['today']],
            ['label' => 'This Week',      'value' => $this->stats['this_week']],
            ['label' => 'This Month',     'value' => $this->stats['this_month']],
            ['label' => 'Unique IPs',     'value' => $this->stats['unique']],
            ['label' => 'Link Clicks',    'value' => $this->stats['link_clicks']],
        ] as $card)
        <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-4 shadow-sm text-center">
            <div class="text-3xl font-bold text-primary-600">{{ number_format($card['value']) }}</div>
            <div class="text-sm text-gray-500 mt-1">{{ $card['label'] }}</div>
        </div>
        @endforeach
    </div>

    <div class="rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Page URL</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($this->topPages as $row)
                <tr>
                    <td class="px-6 py-3 text-sm text-gray-700 dark:text-gray-300">{{ $row['path'] }}</td>
                    <td class="px-6 py-3 text-sm text-right font-semibold text-gray-800 dark:text-gray-200">{{ number_format($row['views']) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="px-6 py-4 text-center text-gray-400">No data yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-filament-panels::page>
