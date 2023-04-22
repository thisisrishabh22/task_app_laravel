<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div
                    class="flex flex-col md:flex-row justify-center items-center md:justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p class="my-2 md:my-0">
                        {{ count($tasks) === 0 ? __('Looks like you have\'nt created any tasks!') : __('You have :count tasks!', ['count' => count($tasks)]) }}
                    </p>
                    <x-primary-button class="my-2 md:my-0">
                        <a href="{{ route('tasks.create') }}">
                            {{ __('Create Task') }}
                        </a>
                    </x-primary-button>
                </div>
            </div>

        </div>

        <div class="flex justify-center items-center">
            <div class="my-4 flex flex-wrap">
                @foreach ($tasks as $task)
                    <div
                        class="max-w-sm p-6 m-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('tasks.show', $task->id) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $task->name }}
                            </h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            {{ 'Start Time: ' . $task->start_time->format('H:i:s A') }}
                            <br />
                            {{ 'End Time: ' . $task->end_time->format('H:i:s A') }}
                        </p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            {{ 'Date: ' . $task->date->format('d M Y, D') }}
                        </p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            {{ 'Completion Status: ' . ($task->is_completed ? 'Completed' : 'Not Completed') }}
                        </p>
                        <a href="{{ route('tasks.show', $task->id) }}"
                            class="mt-6 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
