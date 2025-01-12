<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Drinks') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <!-- Create Button -->
        <div class="mb-6">
            <a href="{{ route('admin.drinks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
                Create New Drink
            </a>
        </div>

        <!-- Drinks Table -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($drinks as $drink)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $drink->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($drink->image)
                                    <img src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->name }}" class="h-12 w-12 object-cover rounded">
                                @else
                                    <span class="text-gray-500">N/A</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $drink->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $drink->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">€{{ number_format($drink->price, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.drinks.edit', $drink->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('admin.drinks.destroy', $drink->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($drinks->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4">No drinks found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
