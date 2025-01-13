<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Admin - FAQ Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-6 flex justify-between">
                <h3 class="text-2xl font-bold">All FAQs</h3>
                <a href="{{ route('admin.faq.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Create New FAQ
                </a>
            </div>
            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Question</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Created At</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($faqs as $faq)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $faq->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $faq->question }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $faq->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    <a href="{{ route('admin.faq.edit', $faq->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $faqs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
