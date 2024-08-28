<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg relative">

                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                        <input type="text" name="title" id="title" class="form-input mt-1 block w-full" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Content') }}</label>
                        <textarea name="content" id="content" rows="5" class="form-textarea mt-1 block w-full" required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tags" class="block text-sm font-medium text-gray-700">{{ __('Tags') }}</label>
                        <select name="tags[]" id="tags" class="form-multiselect mt-1 block w-full" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @if(in_array($tag->id, $post->tags->pluck('id')->toArray())) selected @endif>{{ $tag->tag }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-between mt-6 mb-4">
                        <x-primary-button>
                            {{ __('Update Post') }}
                        </x-primary-button>
                        <x-secondary-button>
                            <a href="{{ route('posts.index') }}">
                                {{ __('Return to All Posts') }}
                            </a>
                        </x-secondary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>