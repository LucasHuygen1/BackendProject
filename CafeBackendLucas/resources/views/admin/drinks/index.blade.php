<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Drinks') }}
        </h2>
    </x-slot>


     <!-- Create -->
     <div class="mb-4">
        <a href="{{ route('admin.drinks.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded">
            Create New Drink
        </a>
    </div>
    <!-- lijst dranken -->
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Image
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Description
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Price
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($drinks as $drink)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $drink->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($drink->image)
                            <img src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->name }}" class="h-12 w-12 object-cover">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $drink->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $drink->description }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        €{{ number_format($drink->price, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                         <!-- edit  -->
                        <a href="{{ route('admin.drinks.edit', $drink->id) }}" class="bg-yellow-500 text-black px-2 py-1 rounded">
                            Edit
                        </a>

                    <!-- Delete  -->
                    <form action="{{ route('admin.drinks.destroy', $drink->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 text-black px-2 py-1 rounded">
                            Delete
                        </button>
                    </form>
                    </td>
                </tr>
            @endforeach

            @if($drinks->isEmpty())
                <tr>
                    <td colspan="5" class="text-center py-4">No drinks found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</x-app-layout>
