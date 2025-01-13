<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Search Form -->
            <form method="GET" action="{{ route('profile.index') }}" class="mb-6">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by username or name" 
                    class="w-full md:w-1/2 border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500">
            </form>

            <!-- Users Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($users as $user)
                    <a href="{{ route('profile.show', $user->name) }}"
                       class="bg-white shadow rounded-lg p-4 flex flex-col items-center hover:shadow-lg transition duration-150">
                        @if($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}"
                                 class="w-24 h-24 rounded-full object-cover mb-4">
                        @else
                            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                                <span class="text-gray-500 text-sm">No Photo</span>
                            </div>
                        @endif
                        <h3 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h3>
                    </a>
                @endforeach
            </div>

            <!-- Pagination (if applicable) -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
