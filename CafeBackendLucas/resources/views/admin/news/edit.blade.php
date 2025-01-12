<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit News') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.news.update', $news->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">title</label>
            <input type="text" id="title" name="title" value="{{ $news->title }}" required>
        </div>

        <div>
            <label for="content">content</label>
            <input type="content" id="content" name="content" value="{{ $news->content }}" required>
        </div>

        <div>
            <label for="published_at">published at</label>
            <input type="published_at" id="published_at" name="published_at" value="{{ $news->published_at }}" required>
        </div>

        <div>
            <label for="user_id">published by</label>
            <input type="user_id" id="user_id" name="user_id" value="{{ $news->user_id }}" disabled>
        </div>


        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded mt-4">Update news</button>
    </form>
</x-app-layout>
