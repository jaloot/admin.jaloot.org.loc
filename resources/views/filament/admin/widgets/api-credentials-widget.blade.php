<x-filament-widgets::widget>
    <x-filament::section
        icon="heroicon-o-finger-print"
        icon-color="primary"
        heading="API KEY"
        description="Your API key used to authenticate requests to the Jaloot API.">
        <div class="mt-2 flex items-stretch gap-4" x-data="{ copied: false }">
            <div class="flex flex-1 items-center gap-[15px] overflow-x-auto rounded-lg border-2 border-dashed border-[#71c76c] bg-gray-50 p-[15px] dark:bg-white/5">
                <span class="whitespace-nowrap font-mono text-sm text-gray-900 dark:text-gray-100">
                    {{ $apiKey->api_key }}
                </span>
            </div>
            <x-filament::button
                color="gray"
                :icon="null"
                x-on:click="navigator.clipboard.writeText('{{ $apiKey->api_key }}');copied = true;setTimeout(() => copied = false, 1500);">
                <x-filament::icon x-show="!copied" icon="heroicon-o-clipboard-document" class="h-4 w-4 text-blue-600 dark:text-sky-400" />
                <x-filament::icon x-show="copied" x-cloak icon="heroicon-o-check" class="h-4 w-4" />
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>