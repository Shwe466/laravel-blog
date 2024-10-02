<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg relative">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
                        <p class="text-gray-700 mb-4">by {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</p>

                        @if ($post->image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}" class="rounded">
                            </div>
                        @endif

                        <div class="content mb-4">
                            {{ $post->content }}
                        </div>

                        <div class="tags mb-4">
                            @foreach ($post->tags as $tag)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->tag }}</span>
                            @endforeach
                        </div>
                    </div>
                    @if(Auth::id() === $post->user_id)
                    <div class="flex space-x-4">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('この記事を削除してもよろしいですか?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>

                <div class="flex justify-between mt-6">
                    @if($previousPost)
                    <a href="{{ route('posts.show', $previousPost->id) }}" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-chevron-left"></i> {{ __('Previous Post') }}
                    </a>
                    @endif
                    <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700">
                        {{ __('Return to All Posts') }}
                    </a>
                    @if($nextPost)
                    <a href="{{ route('posts.show', $nextPost->id) }}" class="text-blue-500 hover:text-blue-700">
                        {{ __('Next Post') }} <i class="fas fa-chevron-right"></i>
                    </a>
                    @endif
                </div>

                <div class="comments mt-6">
                    <h2 class="text-xl font-bold mb-4">{{ __('Comments') }}</h2>

                    @foreach ($post->comments as $comment)
                    <div class="border rounded-lg p-4 mb-4">
                        <p class="text-gray-700">{{ $comment->comment }}</p>
                        <p class="text-gray-500 text-sm">by {{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach

                    @guest
                        <div class="alert bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                            {{ __('You need to login or register to comment on the post.') }}
                            <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">
                                {{ __('Login') }}
                            </a>
                            {{ __('or') }}
                            <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">
                                {{ __('Register') }}
                            </a>
                        </div>
                    @else
                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <x-textarea-input id="comment" name="comment" rows="3" class="form-textarea mt-1 block w-full" :value="old('comment')" />
                                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <x-primary-button>
                                    {{ __('Add Comment') }}
                                </x-primary-button>
                            </div>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout>