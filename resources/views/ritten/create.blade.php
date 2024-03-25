<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <form action="{{ route('dashboard.store-ritten') }}" method="POST">
                        @csrf

                        <!-- Naam Verzender -->
                        <div class="mb-4">
                            <label for="naam_verzender" class="block text-sm font-medium text-gray-700 dark:text-white">Naam Verzender</label>
                            <input type="text" name="naam_verzender" id="naam_verzender" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Adres Verzender -->
                        <div class="mb-4">
                            <label for="adres_verzender" class="block text-sm font-medium text-gray-700 dark:text-white">Adres Verzender</label>
                            <input type="text" name="adres_verzender" id="adres_verzender" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Postcode Verzender -->
                        <div class="mb-4">
                            <label for="postcode_verzender" class="block text-sm font-medium text-gray-700 dark:text-white">Postcode Verzender</label>
                            <input type="text" name="postcode_verzender" id="postcode_verzender" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Plaats Verzender -->
                        <div class="mb-4">
                            <label for="plaats_verzender" class="block text-sm font-medium text-gray-700 dark:text-white">Plaats Verzender</label>
                            <input type="text" name="plaats_verzender" id="plaats_verzender" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Naam Ontvanger -->
                        <div class="mb-4">
                            <label for="naam_ontvanger" class="block text-sm font-medium text-gray-700 dark:text-white">Naam Ontvanger</label>
                            <input type="text" name="naam_ontvanger" id="naam_ontvanger" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Adres Ontvanger -->
                        <div class="mb-4">
                            <label for="adres_ontvanger" class="block text-sm font-medium text-gray-700 dark:text-white">Adres Ontvanger</label>
                            <input type="text" name="adres_ontvanger" id="adres_ontvanger" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Postcode Ontvanger -->
                        <div class="mb-4">
                            <label for="postcode_ontvanger" class="block text-sm font-medium text-gray-700 dark:text-white">Postcode Ontvanger</label>
                            <input type="text" name="postcode_ontvanger" id="postcode_ontvanger" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Plaats Ontvanger -->
                        <div class="mb-4">
                            <label for="plaats_ontvanger" class="block text-sm font-medium text-gray-700 dark:text-white">Plaats Ontvanger</label>
                            <input type="text" name="plaats_ontvanger" id="plaats_ontvanger" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <!-- Submit knop -->
                        <div class="mb-4">
                            <button type="submit" class="inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                Ritten aanmaken
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>