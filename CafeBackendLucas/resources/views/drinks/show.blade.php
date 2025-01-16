<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $drink->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-2xl font-bold">{{ $drink->name }}</h3>
                <p class="text-gray-600 mt-2">€{{ number_format($drink->price, 2) }}</p>
                <img src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->name }}" class="w-full h-48 object-cover rounded-lg mt-4">

                <!-- comments -->
                <h4 class="mt-8 text-xl font-bold">Comments</h4>

                @foreach($drink->comments as $comment)
                    <div class="border rounded-lg p-4 mt-4 bg-gray-50">
                        <p class="text-gray-700">{{ $comment->content }}</p>
                        <small class="text-gray-500">Posted by {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</small>
                    </div>
                @endforeach

                <!-- form comment toevoegen -->
                <form method="POST" action="{{ route('comments.store', $drink->id) }}" class="mt-4">
                    @csrf
                    <textarea name="content" rows="4" class="w-full border rounded-lg p-2 focus:ring focus:border-blue-500" placeholder="Write your comment..."></textarea>
                    <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
