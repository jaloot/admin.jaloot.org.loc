<x-filament-panels::page>

    <div class="space-y-6">

        @php
        $apiKey = auth()->user()->apiKeys()->latest()->first();
        @endphp

        @if ($apiKey)



        <x-filament::section
            icon-color="primary"
            heading="API Key Status"
            description="View the current status and creation date of your API key."
            icon="heroicon-o-shield-check">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                {{-- Status --}}
                <div>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Status
                    </label>

                    <div class="mt-2">
                        <x-filament::badge color="success">
                            Active
                        </x-filament::badge>
                    </div>
                </div>

                {{-- Created --}}
                <div>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Created
                    </label>

                    <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                        {{ $apiKey->created_at?->format('M d, Y \a\t H:i') }}
                    </div>
                </div>

            </div>
        </x-filament::section>

        <x-filament::section
            icon="heroicon-o-finger-print"
            icon-color="primary"
            heading="API KEY"
            description="Your API key used to authenticate requests to the Jaloot API.">
            <div class="mt-2 flex items-stretch gap-4" x-data="{ copied: false }">
                <div class="flex flex-1 items-center gap-[15px] overflow-x-auto rounded-lg border-2 border-dashed border-primary-600 bg-gray-50 p-[10px_15px] dark:bg-white/5">
                    <span class="whitespace-nowrap font-mono text-sm text-gray-900 dark:text-gray-100">
                        {{ $apiKey->api_key }}
                    </span>
                </div>
                <x-filament::button
                    color="primary"
                    :icon="null"
                    x-on:click="navigator.clipboard.writeText('{{ $apiKey->api_key }}');copied = true;setTimeout(() => copied = false, 1500);">
                    <x-filament::icon x-show="!copied" icon="heroicon-o-clipboard-document" class="h-4 w-4" />
                    <x-filament::icon x-show="copied" x-cloak icon="heroicon-o-check" class="h-4 w-4" />
                </x-filament::button>
            </div>

        </x-filament::section>

        <x-filament::section
            :heading="session('new_api_secret') ? __('New') . ' API Secret' : 'API Secret'"
            :description="session('new_api_secret') ? __('Copy this secret now. It will not be displayed again.') : __('Your API secret is shown below in a masked format. If you lose it, you can generate a new one.')"

            icon="heroicon-o-key">

            @if (session('new_api_secret'))

            <div class="mt-2 flex items-stretch gap-4" x-data="{ copied: false }">
                <div class="flex flex-1 items-center gap-[15px] overflow-x-auto rounded-lg border-2 border-dashed border-primary-600 bg-gray-50 p-[10px_15px] dark:bg-white/5">
                    <span class="whitespace-nowrap font-mono text-sm text-gray-900 dark:text-gray-100">
                        {{ session('new_api_secret') }}
                    </span>
                </div>
                <x-filament::button
                    color="primary"
                    :icon="null"
                    x-on:click="navigator.clipboard.writeText('{{ session('new_api_secret') }}');copied = true;setTimeout(() => copied = false, 1500);">
                    <x-filament::icon x-show="!copied" icon="heroicon-o-clipboard-document" class="h-4 w-4" />
                    <x-filament::icon x-show="copied" x-cloak icon="heroicon-o-check" class="h-4 w-4" />
                </x-filament::button>
            </div>

            @else
            <div class="blur-[2px]">
                JALOOT-SK-*******************************************************QJ
            </div>
            @endif

        </x-filament::section>

        @else

        {{-- No API Key --}}
        <x-filament::section
            heading="API Credentials"
            description="You don't have an API key yet.">

            <div class="flex items-center gap-3 text-sm text-gray-500">
                <x-filament::icon
                    icon="heroicon-o-information-circle"
                    class="h-5 w-5" />

                No API credentials have been generated yet.
            </div>

        </x-filament::section>

        @endif

    </div>

</x-filament-panels::page>