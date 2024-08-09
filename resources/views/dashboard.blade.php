<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100">
            {{ __('Event Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-200 shadow-lg rounded-lg ring-1 ring-gray-200 dark:ring-gray-600 p-6">
            <div class="flex justify-between items-center mb-6">
                <button id="prevMonth"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    &lt; Previous
                </button>
                <h3 id="monthYear" class="text-2xl font-semibold text-gray-900 dark:text-gray-700">
                    <!-- Month and Year will be updated via JavaScript -->
                </h3>
                <button id="nextMonth"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    Next &gt;
                </button>
            </div>

            <!-- Calendar Grid -->
            <div class="grid grid-cols-7 gap-2 text-center">
                <!-- Days of the Week -->
                <div class="font-semibold text-gray-900 dark:text-gray-900">Sun</div>
                <div class="font-semibold text-gray-900 dark:text-gray-900">Mon</div>
                <div class="font-semibold text-gray-900 dark:text-gray-900">Tue</div>
                <div class="font-semibold text-gray-900 dark:text-gray-900">Wed</div>
                <div class="font-semibold text-gray-900 dark:text-gray-900">Thu</div>
                <div class="font-semibold text-gray-900 dark:text-gray-900">Fri</div>
                <div class="font-semibold text-gray-900 dark:text-gray-900">Sat</div>

                <!-- Calendar Days -->
                <div id="calendarDays" class="col-span-7 grid grid-cols-7 gap-2">
                    <!-- Days will be populated via JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <!-- Event Modal -->
    <div id="eventModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white dark:bg-gray-100 p-6 rounded-lg shadow-lg w-full max-w-md">
            <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-gray-700 mb-4">Add Event</h3>
            <form id="eventForm">
                <input type="hidden" id="eventDate" name="event_date" />
                <div class="mb-4">
                    <label for="title"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-700">Title</label>
                    <input id="title" name="title" type="text"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 dark:bg-gray-100 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500"
                        required />
                </div>
                <div class="mb-4">
                    <label for="description"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 dark:bg-gray-100 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModal"
                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Cancel</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 ms-2">Save</button>
                </div>
            </form>
            <!-- Existing Events -->
            <div id="existingEvents" class="mt-4">
                <!-- Existing events will be populated via JavaScript -->
            </div>
        </div>
    </div>

</x-app-layout>
