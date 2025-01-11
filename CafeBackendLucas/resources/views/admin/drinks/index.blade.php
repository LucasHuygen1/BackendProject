<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Drinks') }}
        </h2>
    </x-slot>


    <!-- lijst dranken -->
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
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
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($drinks as $drink)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $drink->id }}
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
