<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4">
            <div class="relative p-4 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div>
                    Von der Community bewertete Filme
                </div>
            </div>

        </div>
        <div class="relative h-full flex-1 p-4 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white">
            <livewire:film-ratings />
        </div>
    </div>
</x-layouts.app>
