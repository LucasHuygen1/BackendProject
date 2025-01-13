<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-2xl font-bold mb-6">Our Drinks</h3>
            <!-- Drinks Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($drinks as $drink)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        @if($drink->image)
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->name }}">
                        @else
                            <div class="w-full h-48 flex items-center justify-center bg-gray-200">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <h4 class="text-xl font-semibold text-gray-800">{{ $drink->name }}</h4>
                            <p class="text-gray-600 mt-2">€{{ number_format($drink->price, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
