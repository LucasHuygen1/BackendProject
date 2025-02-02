<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow rounded-lg p-6">
                @if($news->isEmpty())
                    <p class="text-gray-600">No news articles found.</p>
                @else
                    @foreach($news as $newsItem)
                        <div class="mb-6 border-b pb-4 last:border-0">
                            <h3 class="text-2xl font-bold text-gray-800">{{ $newsItem->title }}</h3>
                            <div class="text-sm text-gray-500 mb-2">
                                Published on {{ $newsItem->published_at->format('M d, Y') }}
                            </div>
                            <div class="text-gray-700">
                                {{ $newsItem->content }}
                            </div>
                            @if($newsItem->image)
                                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="h-25 w-30 object-cover rounded">
                            @else
                                <span class="text-gray-500"></span>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
