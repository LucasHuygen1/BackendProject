<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Drink') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.drinks.update', $drink->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">name</label>
            <input type="text" id="name" name="name" value="{{ $drink->name }}" required>
        </div>

        <div>
            <label for="description">description</label>
            <input type="description" id="description" name="description" value="{{ $drink->description }}" required>
        </div>

        <div>
            <label for="price">price</label>
            <input type="price" id="price" name="price" value="{{ $drink->price }}" required>
        </div>


        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded mt-4">Update Drink</button>
    </form>
</x-app-layout>
