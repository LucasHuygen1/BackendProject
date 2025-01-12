<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('User Panel') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <!-- Create Button -->
        <div class="mb-6">
            <a href="{{ route('admin.users.create') }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded shadow">
                Create New User
            </a>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.users.edit', $user->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure?')" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($users->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4">No users found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
