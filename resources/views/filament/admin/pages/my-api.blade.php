<x-filament-panels::page>

    <div class="space-y-6">

        <div>
            <h2 class="text-xl font-bold">
                API Credentials
            </h2>

            <p class="text-sm text-gray-500">
                Manage your API credentials and monitor usage.
            </p>
        </div>

        @php
        $apiKey = auth()->user()->apiKeys()->latest()->first();
        @endphp

        @if ($apiKey)

        <div class="rounded-xl border bg-white p-6 shadow-sm dark:bg-gray-900">

            <div class="space-y-4">

                {{-- API Key --}}
                <div>
                    <label class="text-sm font-medium">
                        API Key
                    </label>

                    <div class="mt-1 rounded-lg bg-gray-100 p-3 font-mono dark:bg-gray-800">
                        {{ $apiKey->api_key }}
                    </div>
                </div>

                {{-- New API Secret --}}
                @if (session('new_api_secret'))

                <div class="rounded-xl border border-warning-300 bg-warning-50 p-6">

                    <h3 class="font-bold">
                        New API Secret
                    </h3>

                    <p class="mt-2 text-sm">
                        Copy this secret now. It will not be displayed again.
                    </p>

                    <div class="mt-4 rounded-lg bg-white p-4 font-mono">
                        {{ session('new_api_secret') }}
                    </div>

                </div>

                @endif

                {{-- Status --}}
                <div>
                    <label class="text-sm font-medium">
                        Status
                    </label>

                    <div class="mt-1">
                        <x-filament::badge color="success">
                            Active
                        </x-filament::badge>
                    </div>
                </div>

                {{-- Created --}}
                <div>
                    <label class="text-sm font-medium">
                        Created
                    </label>

                    <div>
                        {{ $apiKey->created_at?->format('Y-m-d H:i') }}
                    </div>
                </div>

            </div>

        </div>

        @else

        <div class="rounded-xl border p-6">
            <p>
                You don't have an API key yet.
            </p>
        </div>

        @endif

    </div>

</x-filament-panels::page>