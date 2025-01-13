<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4 text-gray-900">
                    {{ __("You're logged in as an admin!") }}
                </div>
            </div>

            <!-- Overview  -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Users  -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Users</h3>
                    <p class="text-3xl text-gray-700 mt-2">{{ $userCount }}</p>
                </div>

                <!-- Drinks  -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">Drinks</h3>
                    <p class="text-3xl text-gray-700 mt-2">{{ $drinkCount }}</p>
                </div>

                <!-- News  -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold text-gray-800">News</h3>
                    <p class="text-3xl text-gray-700 mt-2">{{ $newsCount }}</p>
                </div>
            </div>

            <!-- nav -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.users.index') }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white text-center font-medium px-4 py-3 rounded shadow">
                    Go to User Panel
                </a>
                <a href="{{ route('admin.drinks.index') }}" 
                   class="bg-green-500 hover:bg-green-600 text-white text-center font-medium px-4 py-3 rounded shadow">
                    Go to Drinks
                </a>
                <a href="{{ route('admin.news.index') }}" 
                   class="bg-purple-500 hover:bg-purple-600 text-white text-center font-medium px-4 py-3 rounded shadow">
                    Go to News
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
