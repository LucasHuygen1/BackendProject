<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit News') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ $news->title }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Content -->
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                    <textarea id="content" name="content" rows="4" required
                              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">{{ $news->content }}</textarea>
                </div>

                <!-- Published At -->
                <div class="mb-4">
                    <label for="published_at" class="block text-gray-700 font-medium mb-2">Published At</label>
                    <input type="datetime-local" id="published_at" name="published_at" value="{{ date('Y-m-d\TH:i', strtotime($news->published_at)) }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Published By (Disabled) -->
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-medium mb-2">Published by</label>
                    <input type="text" id="user_id" name="user_id" value="{{ $news->user->name ?? 'Unknown' }}" disabled
                           class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                    <input type="file" id="image" name="image"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                    @if($news->image)
                        <div class="mt-4">
                            <span class="text-gray-700 font-medium">Current Image:</span>
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="h-32 w-auto object-cover mt-2 rounded">
                        </div>
                    @endif
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Update News
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
