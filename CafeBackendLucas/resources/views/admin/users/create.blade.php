<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow rounded-lg p-6 max-w-xl mx-auto">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <!-- Username -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Username</label>
                    <input type="text" id="name" name="name" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                    <select id="role" name="role"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Create User
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
