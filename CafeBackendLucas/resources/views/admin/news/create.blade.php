<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Add News') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow rounded-lg p-6 max-w-4xl mx-auto">
            <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Content -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="4" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image (Optional)</label>
                    <input type="file" name="image" id="image"
                           class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none">
                </div>

                <!-- Published At -->
                <div class="mb-4">
                    <label for="published_at" class="block text-sm font-medium text-gray-700">Published At</label>
                    <input type="datetime-local" name="published_at" id="published_at" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Add News
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
