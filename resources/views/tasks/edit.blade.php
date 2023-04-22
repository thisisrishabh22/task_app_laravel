<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div
                    class="flex flex-col md:flex-row justify-center items-center md:justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p class="my-2 md:my-0">
                        {{ count($tasks) === 0 ? __('Woohoo!! There are no tasks for today!') : __('You have :count tasks for today!', ['count' => count($tasks)]) }}
                    </p>
                    <x-primary-button class="my-2 md:my-0">
                        {{-- <a href="{{ route('tasks.create') }}"> --}}
                        <a href="/">
                            {{ __('Create Task') }}
                        </a>
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
