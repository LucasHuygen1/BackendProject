<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <!-- Username (disabled) -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Username</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" disabled
                           class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
                </div>

                <!-- Email (disabled) -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" disabled
                           class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
                </div>

                <!-- Role (editable) -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                    <select id="role" name="role"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Update User
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
