<x-filament-panels::page>

    {{-- Section heading --}}
    <div class="mb-6">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Select the visual design for the public-facing website. Click a theme card to preview your selection, then press
            <strong class="font-semibold text-gray-700 dark:text-gray-300">Apply Theme</strong> to activate it.
        </p>
    </div>

    {{-- Theme cards --}}
    <div class="grid gap-4 sm:grid-cols-2 mb-6">

        {{-- ── SaaS Card ── --}}
        <button
            type="button"
            wire:click="setTheme('saas')"
            @class([
                'relative text-left rounded-xl border-2 overflow-hidden transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500',
                'border-primary-500 ring-2 ring-primary-500 shadow-lg' => $activeTheme === 'saas',
                'border-gray-200 dark:border-gray-700 hover:border-primary-400 hover:shadow-md' => $activeTheme !== 'saas',
            ])
        >
            {{-- Preview strip --}}
            <div class="h-32 bg-gradient-to-br from-blue-50 via-white to-green-50 relative overflow-hidden">
                {{-- Fake navbar --}}
                <div class="absolute top-0 inset-x-0 h-7 bg-white/90 border-b border-gray-100 flex items-center px-3 gap-2">
                    <div class="w-3 h-3 rounded bg-blue-600"></div>
                    <div class="w-10 h-1.5 rounded bg-gray-200"></div>
                    <div class="ml-auto flex gap-1.5">
                        <div class="w-8 h-1.5 rounded bg-gray-200"></div>
                        <div class="w-8 h-1.5 rounded bg-gray-200"></div>
                        <div class="w-14 h-4 rounded bg-blue-600"></div>
                    </div>
                </div>
                {{-- Fake hero --}}
                <div class="absolute top-10 left-3">
                    <div class="w-24 h-2 rounded bg-blue-600 mb-1.5 opacity-80"></div>
                    <div class="w-32 h-1.5 rounded bg-gray-300 mb-1"></div>
                    <div class="w-20 h-1.5 rounded bg-gray-200"></div>
                    <div class="flex gap-1.5 mt-2">
                        <div class="w-14 h-4 rounded bg-blue-600 opacity-90"></div>
                        <div class="w-12 h-4 rounded border border-gray-300"></div>
                    </div>
                </div>
                {{-- Fake cards --}}
                <div class="absolute top-10 right-3 flex gap-1.5">
                    <div class="w-14 h-16 rounded-lg bg-white border border-gray-100 shadow-sm p-1.5">
                        <div class="w-4 h-4 rounded bg-blue-600 mb-1"></div>
                        <div class="w-8 h-1 rounded bg-gray-200 mb-1"></div>
                        <div class="w-6 h-1 rounded bg-gray-100"></div>
                    </div>
                    <div class="w-14 h-16 rounded-lg bg-white border border-gray-100 shadow-sm p-1.5">
                        <div class="w-4 h-4 rounded bg-green-600 mb-1"></div>
                        <div class="w-8 h-1 rounded bg-gray-200 mb-1"></div>
                        <div class="w-6 h-1 rounded bg-gray-100"></div>
                    </div>
                </div>
            </div>

            {{-- Card body --}}
            <div class="p-4 bg-white dark:bg-gray-800">
                <div class="flex items-center justify-between mb-1">
                    <span class="font-semibold text-gray-900 dark:text-white text-sm">SaaS — Modern</span>
                    @if ($activeTheme === 'saas')
                    <span class="inline-flex items-center gap-1 text-xs font-semibold text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/30 px-2 py-0.5 rounded-full">
                        <x-heroicon-m-check-circle class="w-3 h-3" /> Active
                    </span>
                    @endif
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                    Light-first design with Inter font, clean card layout, and Stripe-style aesthetics. Recommended for enterprise clients.
                </p>
                <div class="flex gap-1.5 mt-3 flex-wrap">
                    <span class="text-[10px] font-medium bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 px-1.5 py-0.5 rounded">Light</span>
                    <span class="text-[10px] font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-1.5 py-0.5 rounded">Inter</span>
                    <span class="text-[10px] font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-1.5 py-0.5 rounded">Dark mode toggle</span>
                    <span class="text-[10px] font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-1.5 py-0.5 rounded">Lightbox gallery</span>
                </div>
            </div>
        </button>

        {{-- ── Classic Card ── --}}
        <button
            type="button"
            wire:click="setTheme('classic')"
            @class([
                'relative text-left rounded-xl border-2 overflow-hidden transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500',
                'border-primary-500 ring-2 ring-primary-500 shadow-lg' => $activeTheme === 'classic',
                'border-gray-200 dark:border-gray-700 hover:border-primary-400 hover:shadow-md' => $activeTheme !== 'classic',
            ])
        >
            {{-- Preview strip --}}
            <div class="h-32 bg-gray-900 relative overflow-hidden">
                {{-- Fake dark navbar --}}
                <div class="absolute top-0 inset-x-0 h-7 bg-gray-900/95 border-b border-white/10 flex items-center px-3 gap-2">
                    <div class="w-3 h-3 rounded bg-blue-500"></div>
                    <div class="w-10 h-1.5 rounded bg-white/20"></div>
                    <div class="ml-auto flex gap-1.5">
                        <div class="w-8 h-1.5 rounded bg-white/20"></div>
                        <div class="w-14 h-4 rounded bg-green-600"></div>
                    </div>
                </div>
                {{-- Fake dark hero --}}
                <div class="absolute top-9 left-0 right-0 bottom-0 bg-gradient-to-r from-blue-900/40 to-green-900/30 px-3 pt-2">
                    <div class="w-24 h-2 rounded bg-blue-400 mb-1.5 opacity-80"></div>
                    <div class="w-36 h-1.5 rounded bg-white/30 mb-1"></div>
                    <div class="w-24 h-1.5 rounded bg-white/20"></div>
                    <div class="flex gap-1.5 mt-2">
                        <div class="w-16 h-4 rounded bg-blue-600 opacity-90"></div>
                        <div class="w-14 h-4 rounded bg-green-600 opacity-80"></div>
                    </div>
                </div>
                {{-- Orb effect --}}
                <div class="absolute top-4 right-4 w-16 h-16 rounded-full bg-blue-500/10 blur-xl"></div>
                <div class="absolute bottom-2 right-8 w-10 h-10 rounded-full bg-green-500/10 blur-lg"></div>
            </div>

            {{-- Card body --}}
            <div class="p-4 bg-white dark:bg-gray-800">
                <div class="flex items-center justify-between mb-1">
                    <span class="font-semibold text-gray-900 dark:text-white text-sm">Classic — Dark</span>
                    @if ($activeTheme === 'classic')
                    <span class="inline-flex items-center gap-1 text-xs font-semibold text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/30 px-2 py-0.5 rounded-full">
                        <x-heroicon-m-check-circle class="w-3 h-3" /> Active
                    </span>
                    @endif
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                    Original dark-themed design with Montserrat font, bold hero section, and gradient accents.
                </p>
                <div class="flex gap-1.5 mt-3 flex-wrap">
                    <span class="text-[10px] font-medium bg-gray-900 text-white px-1.5 py-0.5 rounded">Dark</span>
                    <span class="text-[10px] font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-1.5 py-0.5 rounded">Montserrat</span>
                    <span class="text-[10px] font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-1.5 py-0.5 rounded">Orb effects</span>
                    <span class="text-[10px] font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-1.5 py-0.5 rounded">Marquee</span>
                </div>
            </div>
        </button>

    </div>

    {{-- Action row --}}
    <div class="flex items-center gap-4">
        <x-filament::button wire:click="save" size="lg" icon="heroicon-m-paint-brush">
            Apply Theme
        </x-filament::button>

        <span class="text-sm text-gray-500 dark:text-gray-400">
            Currently active:
            <span class="font-semibold text-gray-700 dark:text-gray-200">
                {{ $activeTheme === 'saas' ? 'SaaS — Modern' : 'Classic — Dark' }}
            </span>
        </span>
    </div>

    {{-- Info note --}}
    <div class="mt-6 p-4 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 flex gap-3 text-sm text-gray-500 dark:text-gray-400">
        <x-heroicon-o-information-circle class="w-5 h-5 text-gray-400 flex-shrink-0 mt-0.5" />
        <div>
            Theme changes apply instantly to all new page loads. Existing visitors will see the new theme on their next navigation.
            The <code class="text-xs bg-gray-200 dark:bg-gray-700 px-1 py-0.5 rounded font-mono">ACTIVE_THEME</code> environment variable
            is used as a fallback if no database value is set.
        </div>
    </div>

</x-filament-panels::page>
