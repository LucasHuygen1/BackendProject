<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit Drink') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('admin.drinks.update', $drink->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ $drink->name }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                    <input type="text" id="description" name="description" value="{{ $drink->description }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                    <input type="text" id="price" name="price" value="{{ $drink->price }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Update Drink
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
