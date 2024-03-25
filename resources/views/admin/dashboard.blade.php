<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="overflow-x-auto">
                        <h2>Update Prijs Per Kilometer</h2>

                        <form action="{{ route('admin.update.prijs') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="prijs">Prijs Per Kilometer:</label>
                                <input type="number" step="0.01" class="form-control" id="prijs" name="prijs" value="{{ old('prijs') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Prijs</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>