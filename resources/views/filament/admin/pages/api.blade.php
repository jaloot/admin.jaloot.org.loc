<x-filament-panels::page>

    <div class="space-y-6">

        @php
        $apiKey = auth()->user()->apiKeys()->latest()->first();
        @endphp

        @if ($apiKey)

        {{-- API Credentials --}}
        <x-filament::section
            icon="heroicon-o-finger-print"
            icon-color="primary"
            heading="API Credentials"
            description="Vos identifiants pour authentifier vos requêtes vers l'API Jaloot.">

            <div class="space-y-6">

                {{-- API Key --}}
                <div>
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        API Key
                    </label>

                    <div class="mt-2 flex items-stretch gap-2" x-data="{ copied: false }">

                        <div class="flex flex-1 items-center overflow-x-auto rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 dark:border-white/10 dark:bg-white/5">
                            <span class="whitespace-nowrap font-mono text-sm text-gray-900 dark:text-gray-100">
                                {{ $apiKey->api_key }}
                            </span>
                        </div>

                        <x-filament::button
                            color="gray"
                            :icon="null"
                            x-on:click="
                                navigator.clipboard.writeText('{{ $apiKey->api_key }}');
                                copied = true;
                                setTimeout(() => copied = false, 1500);
                            ">
                            <span x-show="!copied" class="flex items-center gap-1.5">
                                <x-filament::icon icon="heroicon-o-clipboard-document" class="h-4 w-4" />
                                Copier
                            </span>
                            <span x-show="copied" x-cloak class="flex items-center gap-1.5 text-success-600 dark:text-success-400">
                                <x-filament::icon icon="heroicon-o-check" class="h-4 w-4" />
                                Copié !
                            </span>
                        </x-filament::button>

                    </div>
                </div>

                <div class="border-t border-gray-100 dark:border-white/5"></div>

                {{-- Status / Created --}}
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                    {{-- Status --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Statut
                        </label>

                        <div class="mt-2 flex items-center gap-2">
                            <span class="relative flex h-2 w-2">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-success-400 opacity-75"></span>
                                <span class="relative inline-flex h-2 w-2 rounded-full bg-success-500"></span>
                            </span>
                            <x-filament::badge color="success">
                                Actif
                            </x-filament::badge>
                        </div>
                    </div>

                    {{-- Created --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Créée le
                        </label>

                        <div class="mt-2 flex items-center gap-1.5 text-sm text-gray-900 dark:text-gray-100">
                            <x-filament::icon icon="heroicon-o-calendar" class="h-4 w-4 text-gray-400" />
                            {{ $apiKey->created_at?->format('d M Y \à H:i') }}
                        </div>
                    </div>

                </div>

            </div>

        </x-filament::section>


        {{-- New API Secret --}}
        @if (session('new_api_secret'))

        <x-filament::section
            icon="heroicon-o-key"
            icon-color="warning"
            heading="Nouveau Secret API"
            description="Copiez ce secret maintenant. Il ne sera plus jamais affiché.">

            <div class="rounded-xl border border-warning-200 bg-warning-50/60 p-4 dark:border-warning-400/20 dark:bg-warning-500/5">

                <div class="mb-3 flex items-center gap-2 text-xs font-medium text-warning-700 dark:text-warning-400">
                    <x-filament::icon icon="heroicon-o-exclamation-triangle" class="h-4 w-4" />
                    Cette information ne sera plus jamais visible après avoir quitté cette page.
                </div>

                <div class="flex items-stretch gap-2" x-data="{ copied: false }">

                    <div class="flex flex-1 items-center overflow-x-auto rounded-lg bg-white px-4 py-3 dark:bg-gray-900">
                        <span class="whitespace-nowrap font-mono text-sm text-gray-900 dark:text-gray-100">
                            {{ session('new_api_secret') }}
                        </span>
                    </div>

                    <x-filament::button
                        color="warning"
                        x-on:click="
                            navigator.clipboard.writeText('{{ session('new_api_secret') }}');
                            copied = true;
                            setTimeout(() => copied = false, 1500);
                        ">
                        <span x-show="!copied" class="flex items-center gap-1.5">
                            <x-filament::icon icon="heroicon-o-clipboard-document" class="h-4 w-4" />
                            Copier
                        </span>
                        <span x-show="copied" x-cloak class="flex items-center gap-1.5">
                            <x-filament::icon icon="heroicon-o-check" class="h-4 w-4" />
                            Copié !
                        </span>
                    </x-filament::button>

                </div>

            </div>

        </x-filament::section>

        @endif

        @else

        {{-- No API Key --}}
        <x-filament::section
            icon="heroicon-o-finger-print"
            heading="API Credentials"
            description="Vous n'avez pas encore de clé API.">

            <div class="flex flex-col items-center justify-center gap-3 rounded-xl border border-dashed border-gray-200 py-10 text-center dark:border-white/10">
                <x-filament::icon
                    icon="heroicon-o-key"
                    class="h-8 w-8 text-gray-300 dark:text-gray-600" />

                <p class="text-sm text-gray-500">
                    Aucun identifiant API n'a encore été généré.
                </p>

                {{-- Ajoute ici ton bouton d'action pour créer une clé, ex: --}}
                {{-- <x-filament::button icon="heroicon-o-plus" wire:click="generateKey">Générer une clé</x-filament::button> --}}
            </div>

        </x-filament::section>

        @endif

    </div>

</x-filament-panels::page>