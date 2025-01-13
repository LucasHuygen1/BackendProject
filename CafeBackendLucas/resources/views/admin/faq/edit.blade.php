<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Admin - Edit FAQ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('admin.faq.update', $faq->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="question" class="block text-gray-700 font-medium mb-2">Question</label>
                    <input type="text" id="question" name="question" value="{{ old('question', $faq->question) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="answer" class="block text-gray-700 font-medium mb-2">Answer</label>
                    <textarea id="answer" name="answer" rows="4"
                              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">{{ old('answer', $faq->answer) }}</textarea>
                </div>
                
                <!-- many to many  cat -->
                <div class="mb-4">
                    <label for="categories" class="block text-gray-700 font-medium mb-2">Categories</label>
                    <select name="category_ids[]" id="categories" multiple
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if(in_array($category->id, $faq->categories->pluck('id')->toArray())) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Update FAQ
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
