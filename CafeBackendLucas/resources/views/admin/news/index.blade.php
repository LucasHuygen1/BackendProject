<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

     <!-- Create -->
     <div class="mb-4">
        <a href="{{ route('admin.news.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded">
            Create News
        </a>
    </div>

    <!-- lijst dranken -->
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Image
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Content
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Published at
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Published by
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($news as $news)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $news->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->name }}" class="h-12 w-12 object-cover">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $news->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $news->content }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $news->published_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $news->user_id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                         <!-- edit  -->
                        <a href="{{ route('admin.news.edit', $news->id) }}" class="bg-yellow-500 text-black px-2 py-1 rounded">
                            Edit
                        </a>

                    <!-- Delete  -->
                    <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 text-black px-2 py-1 rounded">
                            Delete
                        </button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
