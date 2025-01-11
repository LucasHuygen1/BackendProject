<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <!-- username en email diabled, kan alleen rol wijzigen -->
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ $user->name }}" disabled>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>

        <div>
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded mt-4">Update User</button>
    </form>
</x-app-layout>
