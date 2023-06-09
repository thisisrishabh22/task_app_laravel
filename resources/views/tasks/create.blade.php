<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center items-center">
            <div class="w-full md:w-2/4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-col justify-center items-center p-6">
                        <div class="flex flex-col my-2 w-full">
                            <label for="name" class="text-gray-900 dark:text-gray-100 text-md mb-2">Title</label>
                            <input type="text" name="name" id="name" placeholder="Title"
                                class="border-2 border-gray-300 p-4 rounded-lg w-full" />
                        </div>

                        <div class="flex flex-col my-2 w-full">
                            <label for="description"
                                class="text-gray-900 dark:text-gray-100 text-md mb-2">Description</label>
                            <textarea name="description" rows="5" id="description" placeholder="Description"
                                class="border-2 border-gray-300 p-4 rounded-lg w-full"></textarea>
                        </div>

                        <div class="flex flex-col my-2 w-full">
                            <label for="date" class="text-gray-900 dark:text-gray-100 text-md mb-2">Date</label>
                            <input type="date" name="date" id="date" placeholder="Date"
                                class="border-2 border-gray-300 p-4 rounded-lg w-full" />
                        </div>

                        <div class="flex w-full">
                            <div class="flex flex-col my-2 mr-2 w-full">
                                <label for="start_time" class="text-gray-900 dark:text-gray-100 text-md mb-2">Start
                                    Time</label>
                                <input type="time" name="start_time" id="start_time" placeholder="Start Time"
                                    class="border-2 border-gray-300 p-4 rounded-lg w-full" />
                            </div>

                            <div class="flex flex-col my-2 ml-2 w-full">
                                <label for="end_time" class="text-gray-900 dark:text-gray-100 text-md mb-2">End
                                    Time</label>
                                <input type="time" name="end_time" id="end_time" placeholder="End Time"
                                    class="border-2 border-gray-300 p-4 rounded-lg w-full" />
                            </div>
                        </div>

                        <div class="flex justify-center my-4 w-full">
                            <x-primary-button class="my-2 md:my-0 px-8 py-6">
                                {{ __('Create Task') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
