<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        {{-- Success Alert --}}
        @if (session()->has('success'))
            <div x-data="{ open_alert: true }" x-show="open_alert" x-init="setTimeout(() => open_alert = false, 10000)"
                class="bg-green-100 border border-green-400 mt-8 text-green-700 px-4 py-3 rounded absolute top-0 left-5 z-index-[1000]"
                role="alert" x-transition:enter="transition ease-in duration-300"
                x-transition:enter-start="left-[-100px] opacity-0" x-transition:enter-end="left-5 opacity-100"
                x-transition:leave="transition ease-out" x-transition:leave-start="left-5 opacity-100"
                x-transition:leave-end="left-[-100px] opactiy-0">
                <div class="flex justify-between items-center">
                    <strong class="font-bold">{{ session()->get('success') }}</strong>
                    <button @click="open_alert = false"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Error Alert --}}
        @if ($errors->any())
            <div x-data="{ open_alert: true }" x-show="open_alert" x-init="setTimeout(() => open_alert = false, 10000)"
                class="bg-red-100 border border-red-400 mt-8 text-red-700 px-4 py-3 rounded absolute top-0 left-5 z-index-[1000]"
                role="alert" x-transition:enter="transition ease-in duration-300"
                x-transition:enter-start="left-[-100px] opacity-0" x-transition:enter-end="left-5 opacity-100"
                x-transition:leave="transition ease-out" x-transition:leave-start="left-5 opacity-100"
                x-transition:leave-end="left-[-100px] opactiy-0">
                <div class="flex justify-between items-center">
                    <strong class="font-bold">There was some error while performing the operation</strong>
                    <button @click="open_alert = false"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
