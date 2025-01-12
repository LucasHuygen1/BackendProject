<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <!-- Create Button -->
        <div class="mb-6">
            <a href="{{ route('admin.news.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded shadow">
                Create News
            </a>
        </div>

        <!-- News Table -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published at</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published by</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($news as $newsItem)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $newsItem->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($newsItem->image)
                                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="h-12 w-12 object-cover rounded">
                                @else
                                    <span class="text-gray-500">N/A</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $newsItem->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($newsItem->content, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $newsItem->published_at }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $newsItem->user_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.news.edit', $newsItem->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($news->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-4">No news found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
