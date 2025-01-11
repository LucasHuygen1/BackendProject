<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Drink') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.drinks.store') }}">
        @csrf

        <div>
            <label for="name">name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="description">description</label>
            <input type="description" id="description" name="description" required>
        </div>

        <div>
            <label for="price">price</label>
            <input type="price" id="price" name="price" required>
        </div>

        <button type="submit">Create Drink</button>
    </form>
</x-app-layout>
