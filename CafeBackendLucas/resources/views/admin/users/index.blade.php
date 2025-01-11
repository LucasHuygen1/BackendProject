<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Panel') }}
        </h2>
    </x-slot>

    <!-- Create -->
    <div class="mb-4">
        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded">
            Create New User
        </a>
    </div>

    <!-- Users tabel -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <!-- edit  -->
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 text-black px-2 py-1 rounded">
                        Edit
                    </a>

                    <!-- Delete  -->
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 text-black px-2 py-1 rounded">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
