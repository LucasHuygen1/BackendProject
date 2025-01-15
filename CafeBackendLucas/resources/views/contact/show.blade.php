<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow rounded-lg p-6 max-w-xl mx-auto">
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf

                <!-- Naam -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Naam</label>
                    <input type="text" id="name" name="name" required class="w-full border rounded px-3 py-2">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" required class="w-full border rounded px-3 py-2">
                </div>

                <!-- Onderwerp -->
                <div class="mb-4">
                    <label for="subject" class="block text-gray-700 font-medium mb-2">Onderwerp</label>
                    <input type="text" id="subject" name="subject" required class="w-full border rounded px-3 py-2">
                </div>

                <!-- Bericht -->
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-medium mb-2">Bericht</label>
                    <textarea id="message" name="message" rows="4" required class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Verzenden
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
