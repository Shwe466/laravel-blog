<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of all Posts') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <button class="btn btn-primary bg-gray-800 text-white px-4 py-2 rounded mb-4 hover:bg-gray-700 focus:bg-gray-700">
                    <a href="{{ route('posts.create') }}">{{ __('Create New Post') }}</a>
                </button>

                @foreach ($posts as $post)
                <div class="border rounded-lg p-4 mb-4 relative">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                            <p class="text-gray-700">by {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</p>
                            <div class="mt-2">
                                @foreach ($post->tags as $tag)
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->tag }}</span>
                                @endforeach
                            </div>
                        </div>
                        @if (Auth::check() && Auth::id() === $post->user_id)
                        <div class="flex space-x-4">
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash-alt fa-lg"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                    <x-primary-button class="mt-6">
                        <a href="{{ route('posts.show', $post->id) }}">{{ __('Read More') }}</a>
                    </x-primary-button>
                </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>