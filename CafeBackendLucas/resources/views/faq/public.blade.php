<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Frequently Asked Questions (FAQ)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            @foreach($categories as $category)
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $category->name }}</h3>
                    @if($category->faqs->isEmpty())
                        <p class="text-gray-600">No FAQ items in this category.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($category->faqs as $faq)
                                <div class="p-4 border rounded">
                                    <h4 class="font-bold text-lg">{{ $faq->question }}</h4>
                                    <p class="text-gray-700 mt-2">{{ $faq->answer }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
