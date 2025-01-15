<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $user->name }}'s Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 bg-white shadow rounded-lg p-6">
            <div class="flex flex-col items-center">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}"
                         class="w-32 h-32 rounded-full object-cover mb-4">
                @else
                    <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                        <span class="text-gray-500">No Photo</span>
                    </div>
                @endif

                <h3 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h3>
                @if($user->birthday)
                    <p class="text-gray-600 mt-2">
                        Birthday: {{ \Carbon\Carbon::parse($user->birthday)->format('M d, Y') }}
                    </p>
                @endif
            </div>

            <div class="mt-6">
                <h4 class="text-xl font-bold mb-2">About Me</h4>
                <p class="text-gray-700">
                    {{ $user->about ?? 'No description provided.' }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
