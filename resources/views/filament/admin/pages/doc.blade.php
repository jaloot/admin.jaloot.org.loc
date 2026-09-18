<x-filament-panels::page>

    @php
    $chapters = [
    'al-faatiha',
    'al-baqara',
    'aal-i-imraan',
    'an-nisaa',
    'al-maaida',
    'al-anaam',
    'al-araaf',
    'al-anfaal',
    'at-tawba',
    'yunus',
    'hud',
    'yusuf',
    'arraad',
    'ibrahim',
    'al-hijr',
    'an-nahl',
    'al-israa',
    'al-kahf',
    'maryam',
    'taa-haa',
    'al-anbiyaa',
    'al-hajj',
    'al-muminoon',
    'an-noor',
    'al-furqaan',
    'ash-shuaraa',
    'an-naml',
    'al-qasas',
    'al-ankaboot',
    'ar-room',
    'luqman',
    'as-sajda',
    'al-ahzaab',
    'saba',
    'faatir',
    'yaseen',
    'as-saaffaat',
    'saad',
    'az-zumar',
    'ghafir',
    'fussilat',
    'ash-shura',
    'az-zukhruf',
    'ad-dukhaan',
    'al-jaathiya',
    'al-ahqaf',
    'muhammad',
    'al-fath',
    'al-hujuraat',
    'qaaf',
    'adh-dhaariyat',
    'at-tur',
    'an-najm',
    'al-qamar',
    'ar-rahmaan',
    'al-waaqia',
    'al-hadid',
    'al-mujaadila',
    'al-hashr',
    'al-mumtahana',
    'as-saff',
    'al-jumua',
    'al-munaafiqoon',
    'at-taghaabun',
    'at-talaaq',
    'at-tahrim',
    'al-mulk',
    'al-qalam',
    'al-haaqqa',
    'al-ma-aarij',
    'nooh',
    'al-jinn',
    'al-muzzammil',
    'al-muddaththir',
    'al-qiyaama',
    'al-insaan',
    'al-mursalaat',
    'an-naba',
    'an-naaziaat',
    'abasa',
    'at-takwir',
    'al-infitaar',
    'al-mutaffifin',
    'al-inshiqaaq',
    'al-burooj',
    'at-taariq',
    'al-alaa',
    'al-ghaashiya',
    'al-fajr',
    'al-balad',
    'ash-shams',
    'al-lail',
    'ad-dhuhaa',
    'ash-sharh',
    'at-tin',
    'al-alaq',
    'al-qadr',
    'al-bayyina',
    'az-zalzala',
    'al-aadiyaat',
    'al-qaaria',
    'at-takaathur',
    'al-asr',
    'al-humaza',
    'al-fil',
    'quraish',
    'al-maaun',
    'al-kawthar',
    'al-kaafiroon',
    'an-nasr',
    'al-masad',
    'al-ikhlaas',
    'al-falaq',
    'an-naas',
    ];
    @endphp


    {{-- ============================================================
        Overview
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Jaloot API</x-slot>

        <x-slot name="description">
            Quran API v2 for developers building Quran applications,
            websites and digital products.
        </x-slot>

        <div class="space-y-4">

            <p class="text-sm leading-6 text-gray-600 dark:text-gray-400">
                The Jaloot API provides structured access to Quran chapters,
                verses, transliterations, revelation metadata, Mushaf page
                references, Juz information, Basmala metadata and prostration markers.
            </p>

            <div class="flex flex-wrap gap-2">
                <x-filament::badge color="primary">
                    API v2
                </x-filament::badge>

                <x-filament::badge color="gray">
                    JSON
                </x-filament::badge>

                <x-filament::badge color="gray">
                    114 chapters
                </x-filament::badge>

                <x-filament::badge color="success">
                    GET
                </x-filament::badge>

                <x-filament::badge color="warning">
                    Read-only
                </x-filament::badge>
            </div>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">

                <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">
                    <div class="flex items-center gap-3">
                        <div class="flex size-9 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                            <x-filament::icon
                                icon="heroicon-o-book-open"
                                class="size-5" />
                        </div>

                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                Chapters
                            </div>

                            <div class="text-lg font-semibold text-gray-950 dark:text-white">
                                114
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">
                    <div class="flex items-center gap-3">
                        <div class="flex size-9 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                            <x-filament::icon
                                icon="heroicon-o-language"
                                class="size-5" />
                        </div>

                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                Languages
                            </div>

                            <div class="text-lg font-semibold text-gray-950 dark:text-white">
                                4
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">
                    <div class="flex items-center gap-3">
                        <div class="flex size-9 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                            <x-filament::icon
                                icon="heroicon-o-server"
                                class="size-5" />
                        </div>

                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                Cache
                            </div>

                            <div class="text-lg font-semibold text-gray-950 dark:text-white">
                                Redis
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Base URL
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Base URL</x-slot>

        <x-slot name="description">
            All Jaloot API v2 endpoints are available under this base path.
        </x-slot>

        <div class="rounded-xl border border-primary-200 bg-primary-50/50 p-4 dark:border-primary-500/20 dark:bg-primary-500/5">

            <div class="mb-2 flex items-center gap-2">
                <x-filament::icon
                    icon="heroicon-o-link"
                    class="size-4 text-primary-600 dark:text-primary-400" />

                <span class="text-xs font-semibold uppercase tracking-wide text-primary-700 dark:text-primary-400">
                    API Base URL
                </span>
            </div>

            <code class="block overflow-x-auto text-sm font-medium text-gray-900 dark:text-gray-100">
                {{ $baseUrl }}/v2
            </code>

        </div>

        <div class="mt-4 flex items-center gap-3 rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

            <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-white/5 dark:text-gray-400">
                <x-filament::icon
                    icon="heroicon-o-document-text"
                    class="size-5" />
            </div>

            <div class="min-w-0">
                <div class="text-sm font-semibold text-gray-950 dark:text-white">
                    API Documentation
                </div>

                <a
                    href="{{ $docUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-1 block truncate text-sm text-primary-600 hover:underline dark:text-primary-400">
                    {{ $docUrl }}
                </a>
            </div>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Authentication
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Authentication</x-slot>

        <x-slot name="description">
            Authenticate every API request using your API key and secret.
        </x-slot>

        <div class="space-y-4">

            <div class="rounded-xl border border-primary-200 bg-primary-50/50 p-4 dark:border-primary-500/20 dark:bg-primary-500/5">

                <div class="flex items-start gap-3">

                    <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary-100 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                        <x-filament::icon
                            icon="heroicon-o-lock-closed"
                            class="size-5" />
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-950 dark:text-white">
                            API credentials required
                        </h3>

                        <p class="mt-1 text-sm leading-5 text-gray-600 dark:text-gray-400">
                            Jaloot uses a key and secret authentication pair.
                            Both credentials must be sent with every request.
                        </p>
                    </div>

                </div>

            </div>


            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">

                {{-- API Key --}}
                <div class="rounded-xl border border-gray-200 bg-white p-4 transition hover:border-primary-300 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-primary-500/40">

                    <div class="flex items-start justify-between gap-3">

                        <div class="flex items-center gap-3">

                            <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                                <x-filament::icon
                                    icon="heroicon-o-key"
                                    class="size-5" />
                            </div>

                            <div>
                                <div class="text-sm font-semibold text-gray-950 dark:text-white">
                                    API Key
                                </div>

                                <code class="mt-1 block text-xs text-gray-500 dark:text-gray-400">
                                    X-API-Key
                                </code>
                            </div>

                        </div>

                        <x-filament::badge color="danger" size="sm">
                            Required
                        </x-filament::badge>

                    </div>

                    <p class="mt-4 text-sm leading-5 text-gray-600 dark:text-gray-400">
                        Public identifier used to identify your application.
                    </p>

                    <code class="mt-3 inline-flex rounded-md bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-white/5 dark:text-gray-300">
                        JALOOT-PUB-...
                    </code>

                </div>


                {{-- API Secret --}}
                <div class="rounded-xl border border-gray-200 bg-white p-4 transition hover:border-primary-300 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-primary-500/40">

                    <div class="flex items-start justify-between gap-3">

                        <div class="flex items-center gap-3">

                            <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                                <x-filament::icon
                                    icon="heroicon-o-shield-check"
                                    class="size-5" />
                            </div>

                            <div>
                                <div class="text-sm font-semibold text-gray-950 dark:text-white">
                                    API Secret
                                </div>

                                <code class="mt-1 block text-xs text-gray-500 dark:text-gray-400">
                                    X-API-Secret
                                </code>
                            </div>

                        </div>

                        <x-filament::badge color="danger" size="sm">
                            Required
                        </x-filament::badge>

                    </div>

                    <p class="mt-4 text-sm leading-5 text-gray-600 dark:text-gray-400">
                        Private credential paired with your API key.
                        Keep it strictly server-side.
                    </p>

                    <code class="mt-3 inline-flex rounded-md bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-white/5 dark:text-gray-300">
                        JALOOT-SEC-...
                    </code>

                </div>

            </div>


            {{-- Accept --}}
            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <div class="flex items-center gap-3">

                        <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-white/5 dark:text-gray-400">
                            <x-filament::icon
                                icon="heroicon-o-document-text"
                                class="size-5" />
                        </div>

                        <div>
                            <div class="text-sm font-semibold text-gray-950 dark:text-white">
                                Accept
                            </div>

                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Response format
                            </p>
                        </div>

                    </div>

                    <div class="flex items-center gap-2">

                        <code class="rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-700 dark:bg-white/5 dark:text-gray-300">
                            application/json
                        </code>

                        <x-filament::badge color="gray" size="sm">
                            Optional
                        </x-filament::badge>

                    </div>

                </div>

            </div>


            {{-- Warning --}}
            <div class="rounded-xl border border-warning-200 bg-warning-50 p-4 dark:border-warning-500/20 dark:bg-warning-500/5">

                <div class="flex items-start gap-3">

                    <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-warning-100 text-warning-600 dark:bg-warning-500/10 dark:text-warning-400">
                        <x-filament::icon
                            icon="heroicon-o-exclamation-triangle"
                            class="size-5" />
                    </div>

                    <div>

                        <h3 class="text-sm font-semibold text-warning-900 dark:text-warning-300">
                            Keep your API secret private
                        </h3>

                        <p class="mt-1 text-sm leading-5 text-warning-800 dark:text-warning-400">
                            Never expose
                            <code>X-API-Secret</code>
                            in browser JavaScript, mobile applications,
                            public repositories or client-side code.
                        </p>

                        <p class="mt-2 text-sm leading-5 text-warning-800 dark:text-warning-400">
                            Rotate the secret immediately if it becomes compromised.
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Request Headers
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Request Headers</x-slot>

        <x-slot name="description">
            Headers accepted by the Jaloot API.
        </x-slot>

        <div class="space-y-3">

            @foreach ([
            [
            'name' => 'X-API-Key',
            'type' => 'string',
            'required' => true,
            'example' => 'JALOOT-PUB-...',
            'description' => 'Your public API key.',
            'icon' => 'heroicon-o-key',
            ],
            [
            'name' => 'X-API-Secret',
            'type' => 'string',
            'required' => true,
            'example' => 'JALOOT-SEC-...',
            'description' => 'Your private API secret.',
            'icon' => 'heroicon-o-shield-check',
            ],
            [
            'name' => 'Accept',
            'type' => 'string',
            'required' => false,
            'example' => 'application/json',
            'description' => 'Optional response format header.',
            'icon' => 'heroicon-o-document-text',
            ],
            ] as $header)

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div class="flex items-start gap-3">

                        <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                            <x-filament::icon
                                :icon="$header['icon']"
                                class="size-5" />
                        </div>

                        <div>
                            <div class="flex flex-wrap items-center gap-2">

                                <code class="text-sm font-semibold text-gray-950 dark:text-white">
                                    {{ $header['name'] }}
                                </code>

                                <x-filament::badge color="gray" size="sm">
                                    {{ $header['type'] }}
                                </x-filament::badge>

                            </div>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ $header['description'] }}
                            </p>
                        </div>

                    </div>

                    <div class="flex flex-wrap items-center gap-2 sm:justify-end">

                        <code class="rounded-lg bg-gray-100 px-2.5 py-1.5 text-xs text-gray-700 dark:bg-white/5 dark:text-gray-300">
                            {{ $header['example'] }}
                        </code>

                        @if ($header['required'])
                        <x-filament::badge color="danger" size="sm">
                            Required
                        </x-filament::badge>
                        @else
                        <x-filament::badge color="gray" size="sm">
                            Optional
                        </x-filament::badge>
                        @endif

                    </div>

                </div>

            </div>

            @endforeach

        </div>
    </x-filament::section>


    {{-- ============================================================
        Reference Request
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Reference Request</x-slot>

        <x-slot name="description">
            A minimal authenticated request to the API.
        </x-slot>

        <div
            x-data="{ copied: false }"
            class="relative">

            <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100"><code>curl "{{ $baseUrl }}/v2/chapter/al-faatiha" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "X-API-Secret: YOUR_API_SECRET" \
  -H "Accept: application/json"</code></pre>

            <button
                type="button"
                x-on:click="
                    const text = $el.previousElementSibling.innerText;
                    if (navigator.clipboard) {
                        navigator.clipboard.writeText(text).then(() => {
                            copied = true;
                            setTimeout(() => copied = false, 1500);
                        });
                    }
                "
                class="absolute right-3 top-3 inline-flex items-center gap-1.5 rounded-lg bg-white/10 px-2.5 py-1.5 text-xs font-medium text-gray-200 transition hover:bg-white/20">
                <x-filament::icon
                    icon="heroicon-o-clipboard-document"
                    class="size-4" />

                <span x-show="!copied">
                    Copy
                </span>

                <span
                    x-show="copied"
                    x-cloak>
                    Copied!
                </span>
            </button>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Endpoints
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Endpoints</x-slot>

        <x-slot name="description">
            Available read-only endpoints in API v2.
        </x-slot>

        <div class="space-y-4">

            {{-- Chapters --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex flex-wrap items-center gap-2">

                    <x-filament::badge color="success">
                        GET
                    </x-filament::badge>

                    <code class="text-sm font-medium text-gray-900 dark:text-gray-100">
                        /v2/chapters
                    </code>

                </div>

                <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
                    Returns the collection of all 114 Quran chapters.
                    The endpoint provides chapter metadata and does not include
                    the complete verse text.
                </p>

                <div class="mt-4 flex flex-wrap gap-2">
                    <x-filament::badge color="primary">
                        114 chapters
                    </x-filament::badge>

                    <x-filament::badge color="gray">
                        Collection
                    </x-filament::badge>

                    <x-filament::badge color="gray">
                        Cached
                    </x-filament::badge>
                </div>

            </div>


            {{-- Chapter --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex flex-wrap items-center gap-2">

                    <x-filament::badge color="success">
                        GET
                    </x-filament::badge>

                    <code class="text-sm font-medium text-gray-900 dark:text-gray-100">
                        /v2/chapter/{identifier}
                    </code>

                </div>

                <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
                    Returns a complete chapter resource including metadata,
                    verses, revelation information, page references,
                    Basmala information and prostration markers.
                </p>

                <div class="mt-4">

                    <div class="mb-2 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                        Identifier
                    </div>

                    <div class="flex flex-wrap gap-2">

                        <x-filament::badge color="primary">
                            1
                        </x-filament::badge>

                        <x-filament::badge color="primary">
                            al-faatiha
                        </x-filament::badge>

                        <x-filament::badge color="primary">
                            al-baqara
                        </x-filament::badge>

                    </div>

                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                        Accepts a chapter number from 1 to 114 or one of the documented chapter slugs.
                    </p>

                </div>

            </div>

            {{-- Random Verse --}}
            <div class="rounded-xl border border-primary-200 bg-primary-50/50 p-5 dark:border-primary-500/20 dark:bg-primary-500/5">

                <div class="flex flex-wrap items-center gap-2">

                    <x-filament::badge color="success">
                        GET
                    </x-filament::badge>

                    <code class="text-sm font-medium text-gray-900 dark:text-gray-100">
                        /v2/verse/random
                    </code>

                    <x-filament::badge color="warning">
                        No cache
                    </x-filament::badge>

                </div>

                <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-400">
                    Returns one randomly selected Quran verse with its chapter,
                    localized text and available tafsir entries.
                    The <code>lang</code> query parameter is optional.
                    Arabic (<code>ar</code>) is used when no language is supplied.
                </p>

                <div class="mt-4 flex flex-wrap gap-2">
                    <x-filament::badge color="primary">
                        Random verse
                    </x-filament::badge>

                    <x-filament::badge color="gray">
                        lang optional
                    </x-filament::badge>

                    <x-filament::badge color="gray">
                        ar · en · fr · es
                    </x-filament::badge>

                    <x-filament::badge color="warning">
                        Not cached
                    </x-filament::badge>
                </div>

                <div class="mt-4">
                    <div class="mb-2 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                        Query parameter
                    </div>

                    <div class="flex flex-wrap items-center gap-2">
                        <code class="text-sm font-semibold text-gray-950 dark:text-white">
                            lang
                        </code>

                        <x-filament::badge color="gray" size="sm">
                            string
                        </x-filament::badge>

                        <x-filament::badge color="gray" size="sm">
                            Optional
                        </x-filament::badge>

                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            Supported values:
                            <code>ar</code>,
                            <code>en</code>,
                            <code>fr</code>,
                            <code>es</code>
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Languages
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Languages</x-slot>

        <x-slot name="description">
            The API currently supports Arabic, English, French and Spanish.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">

            <div class="rounded-xl border border-primary-200 bg-primary-50/50 p-4 dark:border-primary-500/20 dark:bg-primary-500/5">
                <x-filament::badge color="primary">
                    ar
                </x-filament::badge>

                <div class="mt-3 text-sm font-semibold text-gray-950 dark:text-white">
                    Arabic
                </div>

                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Default language
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">
                <x-filament::badge color="primary">
                    en
                </x-filament::badge>

                <div class="mt-3 text-sm font-semibold text-gray-950 dark:text-white">
                    English
                </div>

                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    English translation
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">
                <x-filament::badge color="primary">
                    fr
                </x-filament::badge>

                <div class="mt-3 text-sm font-semibold text-gray-950 dark:text-white">
                    French
                </div>

                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    French translation
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">
                <x-filament::badge color="primary">
                    es
                </x-filament::badge>

                <div class="mt-3 text-sm font-semibold text-gray-950 dark:text-white">
                    Spanish
                </div>

                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Spanish translation
                </div>
            </div>

        </div>

        <div class="mt-4 rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-white/10 dark:bg-white/5">

            <div class="flex items-start gap-3">

                <x-filament::icon
                    icon="heroicon-o-language"
                    class="mt-0.5 size-5 shrink-0 text-primary-600 dark:text-primary-400" />

                <p class="text-sm leading-6 text-gray-600 dark:text-gray-400">
                    Arabic (<code>ar</code>) is used by default when no language
                    preference is supplied. Supported languages are
                    <code>ar</code>, <code>en</code>, <code>fr</code> and <code>es</code>.
                    The response exposes the selected language through the
                    <code>language</code> object.
                </p>

            </div>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Language Object
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Language Object</x-slot>

        <x-slot name="description">
            Every localized response identifies the language and text direction.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

            <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">

                <div class="flex items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        code
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        string
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    Language identifier such as <code>ar</code>, <code>en</code>,
                    <code>fr</code> or <code>es</code>.
                </p>

            </div>

            <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">

                <div class="flex items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        direction
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        string
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    Text direction, such as <code>rtl</code> for Arabic.
                </p>

            </div>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Chapter Slugs
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Chapter Slugs</x-slot>

        <x-slot name="description">
            Use these slugs as the identifier in
            <code>/v2/chapter/{identifier}</code>.
        </x-slot>

        <div class="flex flex-wrap gap-2">

            @foreach ($chapters as $index => $slug)

            <x-filament::badge
                color="gray"
                :tooltip="'Chapter ' . ($index + 1)">
                {{ $slug }}
            </x-filament::badge>

            @endforeach

        </div>

        <div class="mt-5 flex flex-wrap gap-2">

            <x-filament::badge color="primary">
                {{ count($chapters) }} slugs
            </x-filament::badge>

            <x-filament::badge color="success">
                Complete Quran
            </x-filament::badge>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Chapter Resource
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Chapter Resource</x-slot>

        <x-slot name="description">
            Fields returned by a chapter resource.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ([
            [
            'name' => 'id',
            'type' => 'integer',
            'desc' => 'Chapter number from 1 to 114.',
            ],
            [
            'name' => 'name',
            'type' => 'string',
            'desc' => 'Arabic chapter name.',
            ],
            [
            'name' => 'name_transliteration',
            'type' => 'string',
            'desc' => 'Transliterated chapter name.',
            ],
            [
            'name' => 'slug',
            'type' => 'string',
            'desc' => 'Unique chapter slug used as an identifier.',
            ],
            [
            'name' => 'revelation',
            'type' => 'object',
            'desc' => 'Revelation place, type and chronological order.',
            ],
            [
            'name' => 'verses_count',
            'type' => 'integer',
            'desc' => 'Total number of verses in the chapter.',
            ],
            [
            'name' => 'pages',
            'type' => 'object',
            'desc' => 'Starting and ending Mushaf pages.',
            ],
            [
            'name' => 'basmala',
            'type' => 'object',
            'desc' => 'Basmala inclusion and verse status.',
            ],
            [
            'name' => 'prostrations',
            'type' => 'array',
            'desc' => 'Prostration markers associated with the chapter.',
            ],
            [
            'name' => 'verses',
            'type' => 'array',
            'desc' => 'Complete list of verses when returned by the chapter resource.',
            ],
            ] as $field)

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex flex-wrap items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $field['name'] }}
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        {{ $field['type'] }}
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    {{ $field['desc'] }}
                </p>

            </div>

            @endforeach

        </div>
    </x-filament::section>


    {{-- ============================================================
        Revelation
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Revelation Metadata</x-slot>

        <x-slot name="description">
            Each chapter includes structured revelation information.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 md:grid-cols-3">

            @foreach ([
            [
            'name' => 'place',
            'type' => 'string',
            'desc' => 'Revelation location.',
            'example' => 'مكّة المكرّمة',
            ],
            [
            'name' => 'type',
            'type' => 'string',
            'desc' => 'Revelation classification.',
            'example' => 'مكية',
            ],
            [
            'name' => 'order',
            'type' => 'integer',
            'desc' => 'Chronological revelation order.',
            'example' => '5',
            ],
            ] as $field)

            <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">

                <div class="flex items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $field['name'] }}
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        {{ $field['type'] }}
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                    {{ $field['desc'] }}
                </p>

                <code class="mt-3 inline-flex rounded-md bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-white/5 dark:text-gray-300">
                    {{ $field['example'] }}
                </code>

            </div>

            @endforeach

        </div>
    </x-filament::section>


    {{-- ============================================================
        Basmala
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Basmala</x-slot>

        <x-slot name="description">
            The Basmala object indicates whether the Basmala is included
            and whether it is considered a verse for the chapter.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        included
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        boolean
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-sm leading-5 text-gray-600 dark:text-gray-400">
                    Indicates whether the Basmala is included in the chapter response.
                </p>

            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        is_verse
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        boolean
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-sm leading-5 text-gray-600 dark:text-gray-400">
                    Indicates whether the Basmala is treated as a verse.
                </p>

            </div>

        </div>

        <div class="mt-4 rounded-xl border border-primary-200 bg-primary-50/50 p-4 dark:border-primary-500/20 dark:bg-primary-500/5">

            <div class="flex items-start gap-3">

                <x-filament::icon
                    icon="heroicon-o-information-circle"
                    class="mt-0.5 size-5 shrink-0 text-primary-600 dark:text-primary-400" />

                <div class="text-sm leading-6 text-gray-600 dark:text-gray-400">

                    <p>
                        For example, Al-Fatiha currently returns:
                    </p>

                    <code class="mt-2 inline-flex rounded-lg bg-white px-3 py-2 text-xs text-gray-800 shadow-sm dark:bg-white/10 dark:text-gray-200">
                        included: false · is_verse: true
                    </code>

                </div>

            </div>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Verse Resource
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Verse Resource</x-slot>

        <x-slot name="description">
            Verse resources contain the Quranic text and Mushaf references.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ([
            [
            'name' => 'number',
            'type' => 'integer',
            'desc' => 'Verse number within the chapter.',
            ],
            [
            'name' => 'text',
            'type' => 'string',
            'desc' => 'Verse text in the requested language.',
            ],
            [
            'name' => 'text_simple',
            'type' => 'string',
            'desc' => 'Simplified Quranic text without the full diacritic notation.',
            ],
            [
            'name' => 'recitation',
            'type' => 'string',
            'desc' => 'Quran recitation associated with the verse, such as Warsh.',
            ],
            [
            'name' => 'line',
            'type' => 'integer',
            'desc' => 'Mushaf line reference.',
            ],
            [
            'name' => 'juz',
            'type' => 'integer',
            'desc' => 'Juz containing the verse.',
            ],
            [
            'name' => 'page',
            'type' => 'integer',
            'desc' => 'Mushaf page containing the verse.',
            ],
            [
            'name' => 'tafsirs',
            'type' => 'array',
            'desc' => 'Available tafsir entries for the requested language.',
            ],
            ] as $field)

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex flex-wrap items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $field['name'] }}
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        {{ $field['type'] }}
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    {{ $field['desc'] }}
                </p>

            </div>

            @endforeach

        </div>
    </x-filament::section>


    {{-- ============================================================
        Prostrations
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Prostrations</x-slot>

        <x-slot name="description">
            Chapters containing a prostration marker expose it through the
            <code>prostrations</code> array.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 md:grid-cols-3">

            @foreach ([
            [
            'name' => 'verse_number',
            'type' => 'integer',
            'desc' => 'Verse containing the prostration marker.',
            ],
            [
            'name' => 'recommended',
            'type' => 'boolean',
            'desc' => 'Whether the prostration is recommended.',
            ],
            [
            'name' => 'obligatory',
            'type' => 'boolean',
            'desc' => 'Whether the prostration is obligatory.',
            ],
            ] as $field)

            <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">

                <div class="flex items-center gap-2">

                    <code class="text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $field['name'] }}
                    </code>

                    <x-filament::badge color="gray" size="sm">
                        {{ $field['type'] }}
                    </x-filament::badge>

                </div>

                <p class="mt-2 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    {{ $field['desc'] }}
                </p>

            </div>

            @endforeach

        </div>

        <div class="mt-4 flex flex-wrap gap-2">

            <x-filament::badge color="warning">
                Recommended
            </x-filament::badge>

            <x-filament::badge color="danger">
                Obligatory
            </x-filament::badge>

        </div>

    </x-filament::section>


    {{-- ============================================================
        Response Envelope
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Response Structure</x-slot>

        <x-slot name="description">
            API responses expose request metadata together with the requested resource.
        </x-slot>

        <div
            x-data="{ copied: false }"
            class="relative">

            <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100"><code>{
  "request": {
    "status": 200,
    "response_time": "140.31ms",
    "cache": {
      "hit": false,
      "key": "chapters.quran.ar",
      "store": "redis",
      "time": "32.13ms"
    }
  },
  "language": {
    "code": "ar",
    "direction": "rtl"
  },
  "chapters": [
    {
      "id": 1,
      "name": "الفاتحة",
      "name_transliteration": "Al-Fātiĥah",
      "slug": "al-faatiha",
      "revelation": {
        "place": "مكّة المكرّمة",
        "type": "مكية",
        "order": 5
      },
      "verses_count": 7,
      "pages": {
        "start": 1,
        "end": 1
      },
      "basmala": {
        "included": false,
        "is_verse": true
      },
      "prostrations": []
    }
  ]
}</code></pre>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Random Verse Response
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Random Verse Response</x-slot>

        <x-slot name="description">
            Example response returned by <code>/v2/verse/random</code>.
            This endpoint is not cached, so the request cache metadata is always
            reported with no cache key, store or cache time.
        </x-slot>

        <div
            x-data="{ copied: false }"
            class="relative">

            <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100">
                <code>
{
  "request": {
    "status": 200,
    "response_time": "156.86ms",
    "cache": {
      "hit": false,
      "key": null,
      "store": null,
      "time": null
    }
  },
  "lang": "العربية",
  "recitation": "ورش",
  "chapter": {
    "number": 11,
    "slug": "hud",
    "name": "هود"
  },
  "verse": {
    "number": 49,
    "text": "تِلْكَ مِنَ اَنۢبَآءِ اِ۬لْغَيْبِ نُوحِيهَآ إِلَيْكَۖ مَا كُنتَ تَعْلَمُهَآ أَنتَ وَلَا قَوْمُكَ مِن قَبْلِ هَٰذَاۖ فَاصْبِرِۖ اِنَّ اَ۬لْعَٰقِبَةَ لِلْمُتَّقِينَۖ",
    "text_simple": "تلك من أنباء الغيب نوحيها إليك ما كنت تعلمها أنت ولا قومك من قبل هذا فاصبر إن العاقبة للمتقين",
    "juz": 12,
    "page": 227
  },
  "tafsirs": [
    {
      "title": "التفسير الميسر",
      "author": "نخبة من العلماء",
      "book_name": "التفسير الميسر",
      "text": "تلك القصة التي قصصناها عليك -أيها الرسول- عن نوح وقومه هي من أخبار الغيب السالفة، نوحيها إليك، ما كنت تعلمها أنت ولا قومك مِن قبل هذا البيان، فاصبر على تكذيب قومك وإيذائهم لك، كما صبر الأنبياء من قبل، إن العاقبة الطيبة في الدنيا والآخرة للمتقين الذين يخشون الله."
    },
    {
      "title": "تفسير الجلالين",
      "author": "جلال الدين المحلي و السيوطي",
      "book_name": "تفسير الجلالين",
      "text": "«تلك» أي هذه الآيات المتضمنة قصة نوح «من أنباء الغيب» أخبار ما غاب عنك «نوحيها إليك» يا محمد «ما كنت تعلمها أنت ولا قومك من قبل هذا» القرآن «فاصبر» على التبليغ وأذى قومك كما صبر نوح «إن العاقبة» المحمودة «للمتقين»."
    }
  ]
}
                </code>
            </pre>
        </div>
    </x-filament::section>


    {{-- ============================================================
        Cache
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Caching</x-slot>

        <x-slot name="description">
            Cacheable API responses use Redis to improve performance
            and reduce database load. The <code>/v2/verse/random</code> endpoint
            is intentionally not cached.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ([
            [
            'title' => 'Store',
            'value' => 'Redis',
            'icon' => 'heroicon-o-circle-stack',
            ],
            [
            'title' => 'Cache hit',
            'value' => 'Boolean',
            'icon' => 'heroicon-o-check-circle',
            ],
            [
            'title' => 'Cache key',
            'value' => 'String',
            'icon' => 'heroicon-o-key',
            ],
            [
            'title' => 'Timing',
            'value' => 'Milliseconds',
            'icon' => 'heroicon-o-clock',
            ],
            [
            'title' => 'Random verse',
            'value' => 'No cache',
            'icon' => 'heroicon-o-arrow-path',
            ],
            ] as $item)

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex items-center gap-3">

                    <div class="flex size-9 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                        <x-filament::icon
                            :icon="$item['icon']"
                            class="size-5" />
                    </div>

                    <div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $item['title'] }}
                        </div>

                        <div class="text-sm font-semibold text-gray-950 dark:text-white">
                            {{ $item['value'] }}
                        </div>
                    </div>

                </div>

            </div>

            @endforeach

        </div>

        <div class="mt-4 rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-white/10 dark:bg-white/5">

            <p class="text-sm leading-6 text-gray-600 dark:text-gray-400">
                Cache information is available under
                <code>request.cache</code>.
                This includes the cache hit state, cache key, storage driver
                and cache operation time.
            </p>

        </div>
    </x-filament::section>


    {{-- ============================================================
        Errors
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Errors</x-slot>

        <x-slot name="description">
            Errors are returned as JSON with a status code, error identifier,
            message and documentation URL.
        </x-slot>

        <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100"><code>{
  "status": 404,
  "error": "chapter_not_found",
  "message": "No chapter found for identifier 'al-fatiha-typo'.",
  "documentation_url": "{{ $docUrl }}"
}</code></pre>

        <div class="mt-5 space-y-3">

            @foreach ([
            [
            'error' => 'missing_parameters',
            'desc' => 'Required request parameters are missing.',
            ],
            [
            'error' => 'invalid_identifier',
            'desc' => 'The supplied chapter identifier is invalid.',
            ],
            [
            'error' => 'chapter_not_found',
            'desc' => 'No chapter matches the supplied identifier.',
            ],
            ] as $error)

            <div class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-white p-4 sm:flex-row sm:items-center dark:border-white/10 dark:bg-white/[0.02]">

                <x-filament::badge color="danger">
                    {{ $error['error'] }}
                </x-filament::badge>

                <span class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $error['desc'] }}
                </span>

            </div>

            @endforeach

        </div>
    </x-filament::section>


    {{-- ============================================================
        HTTP Status Codes
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">HTTP Status Codes</x-slot>

        <x-slot name="description">
            Common HTTP status codes returned by the API.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ([
            [
            'code' => '200',
            'title' => 'OK',
            'desc' => 'The request completed successfully.',
            'color' => 'success',
            ],
            [
            'code' => '401',
            'title' => 'Unauthorized',
            'desc' => 'API credentials are missing or invalid.',
            'color' => 'danger',
            ],
            [
            'code' => '404',
            'title' => 'Not Found',
            'desc' => 'The requested chapter could not be found.',
            'color' => 'danger',
            ],
            [
            'code' => '422',
            'title' => 'Unprocessable Entity',
            'desc' => 'The supplied identifier or request data is invalid.',
            'color' => 'danger',
            ],
            [
            'code' => '429',
            'title' => 'Too Many Requests',
            'desc' => 'The API rate limit has been exceeded.',
            'color' => 'warning',
            ],
            [
            'code' => '500',
            'title' => 'Server Error',
            'desc' => 'An unexpected server-side error occurred.',
            'color' => 'danger',
            ],
            ] as $status)

            <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex items-center gap-2">

                    <x-filament::badge :color="$status['color']">
                        {{ $status['code'] }}
                    </x-filament::badge>

                    <span class="text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $status['title'] }}
                    </span>

                </div>

                <p class="mt-2 text-xs leading-5 text-gray-500 dark:text-gray-400">
                    {{ $status['desc'] }}
                </p>

            </div>

            @endforeach

        </div>
    </x-filament::section>


    {{-- ============================================================
        Example Requests
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Example Requests</x-slot>

        <x-slot name="description">
            Common ways to request Quran data.
        </x-slot>

        <div class="space-y-5">

            {{-- By number --}}
            <div>

                <div class="mb-2 flex flex-wrap items-center gap-2">

                    <x-filament::badge color="success">
                        GET
                    </x-filament::badge>

                    <code class="text-sm font-medium">
                        Chapter by number
                    </code>

                </div>

                <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100"><code>curl "{{ $baseUrl }}/v2/chapter/1" \
    -H "X-API-Key: YOUR_API_KEY" \
    -H "X-API-Secret: YOUR_API_SECRET" \
    -H "Accept: application/json"</code></pre>

            </div>


            {{-- By slug --}}
            <div>

                <div class="mb-2 flex flex-wrap items-center gap-2">

                    <x-filament::badge color="success">
                        GET
                    </x-filament::badge>

                    <code class="text-sm font-medium">
                        Chapter by slug
                    </code>

                </div>

                <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100"><code>curl "{{ $baseUrl }}/v2/chapter/al-faatiha" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "X-API-Secret: YOUR_API_SECRET" \
  -H "Accept: application/json"</code></pre>

            </div>


            {{-- Random verse --}}
            <div>

                <div class="mb-2 flex flex-wrap items-center gap-2">

                    <x-filament::badge color="success">
                        GET
                    </x-filament::badge>

                    <code class="text-sm font-medium">
                        Random verse
                    </code>

                    <x-filament::badge color="warning">
                        No cache
                    </x-filament::badge>

                </div>
                <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100"><code>curl "{{ $baseUrl }}/v2/verse/random" \
    -H "X-API-Key: YOUR_API_KEY" \
    -H "X-API-Secret: YOUR_API_SECRET" \
    -H "Accept: application/json"</code></pre>
            </div>
            {{-- All chapters --}}
            <div>

                <div class="mb-2 flex flex-wrap items-center gap-2">

                    <x-filament::badge color="success">
                        GET
                    </x-filament::badge>

                    <code class="text-sm font-medium">
                        All chapters
                    </code>

                </div>

                <pre class="overflow-x-auto rounded-xl bg-gray-950 p-5 text-xs leading-relaxed text-gray-100"><code>curl "{{ $baseUrl }}/v2/chapters" \
    -H "X-API-Key: YOUR_API_KEY" \
    -H "X-API-Secret: YOUR_API_SECRET" \
    -H "Accept: application/json"</code></pre>

            </div>

            <x-filament::badge color="success">
                        The <code>lang</code> parameter is optional. Arabic is used by default. <code>?lang=ar|en|es|fr</code>
            </x-filament::badge>
        </div>
    </x-filament::section>


    {{-- ============================================================
        Security
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Security Recommendations</x-slot>

        <x-slot name="description">
            Follow these practices when integrating the Jaloot API.
        </x-slot>

        <div class="space-y-3">

            @foreach ([
            [
            'title' => 'Protect your API secret',
            'desc' => 'Keep X-API-Secret exclusively on your server.',
            'icon' => 'heroicon-o-shield-check',
            ],
            [
            'title' => 'Do not commit credentials',
            'desc' => 'Never store API credentials in public Git repositories.',
            'icon' => 'heroicon-o-code-bracket-square',
            ],
            [
            'title' => 'Avoid client-side exposure',
            'desc' => 'Never expose your API secret in browser JavaScript or mobile applications.',
            'icon' => 'heroicon-o-eye-slash',
            ],
            [
            'title' => 'Rotate compromised credentials',
            'desc' => 'Generate new credentials immediately if a secret is exposed.',
            'icon' => 'heroicon-o-arrow-path',
            ],
            [
            'title' => 'Use HTTPS',
            'desc' => 'Always communicate with the Jaloot API over HTTPS.',
            'icon' => 'heroicon-o-lock-closed',
            ],
            ] as $item)

            <div class="flex items-start gap-3 rounded-xl border border-gray-200 bg-white p-4 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">

                    <x-filament::icon
                        :icon="$item['icon']"
                        class="size-5" />

                </div>

                <div>

                    <div class="text-sm font-semibold text-gray-950 dark:text-white">
                        {{ $item['title'] }}
                    </div>

                    <p class="mt-1 text-sm leading-5 text-gray-600 dark:text-gray-400">
                        {{ $item['desc'] }}
                    </p>

                </div>

            </div>

            @endforeach

        </div>
    </x-filament::section>


    {{-- ============================================================
        Quick Reference
    ============================================================ --}}

    <x-filament::section>
        <x-slot name="heading">Quick Reference</x-slot>

        <x-slot name="description">
            The essentials for getting started with Jaloot API v2.
        </x-slot>

        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">

            <div class="rounded-xl border border-primary-200 bg-primary-50/50 p-5 dark:border-primary-500/20 dark:bg-primary-500/5">

                <div class="flex items-center gap-3">

                    <div class="flex size-9 items-center justify-center rounded-lg bg-primary-100 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                        <x-filament::icon
                            icon="heroicon-o-rocket-launch"
                            class="size-5" />
                    </div>

                    <div>
                        <div class="text-sm font-semibold text-gray-950 dark:text-white">
                            Get a chapter
                        </div>

                        <code class="mt-1 block text-xs text-primary-700 dark:text-primary-400">
                            GET /v2/chapter/{identifier}
                        </code>
                    </div>

                </div>

            </div>


            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-white/10 dark:bg-white/[0.02]">

                <div class="flex items-center gap-3">

                    <div class="flex size-9 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-white/5 dark:text-gray-400">
                        <x-filament::icon
                            icon="heroicon-o-list-bullet"
                            class="size-5" />
                    </div>

                    <div>
                        <div class="text-sm font-semibold text-gray-950 dark:text-white">
                            Get all chapters
                        </div>

                        <code class="mt-1 block text-xs text-gray-600 dark:text-gray-400">
                            GET /v2/chapters
                        </code>
                    </div>

                </div>

            </div>


            <div class="rounded-xl border border-primary-200 bg-primary-50/50 p-5 dark:border-primary-500/20 dark:bg-primary-500/5">

                <div class="flex items-center gap-3">

                    <div class="flex size-9 items-center justify-center rounded-lg bg-primary-100 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                        <x-filament::icon
                            icon="heroicon-o-sparkles"
                            class="size-5" />
                    </div>

                    <div>
                        <div class="text-sm font-semibold text-gray-950 dark:text-white">
                            Get a random verse
                        </div>

                        <code class="mt-1 block text-xs text-primary-700 dark:text-primary-400">
                            GET /v2/verse/random
                        </code>
                    </div>

                </div>

            </div>

        </div>
    </x-filament::section>


</x-filament-panels::page>