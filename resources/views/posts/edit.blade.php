<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg relative">

                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Blog Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="form-input mt-1 block w-full" :value="old('title', $post->title)" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Blog Content -->
                    <div class="mb-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-textarea-input id="content" name="content" rows="5" class="form-textarea mt-1 block w-full" :value="old('content', $post->content)" required />
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Blog Image -->
                    <div class="mb-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-file-input id="image" name="image" class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Blog Tag -->
                    <div class="mb-4">
                        <x-input-label for="tags" :value="__('Tags')" />
                        <x-select-input
                            id="tags"
                            name="tags[]"
                            :options="$tags->pluck('tag', 'id')"
                            multiple
                            :selected="old('tags', $post->tags->pluck('id')->toArray())"
                            class="form-multiselect mt-1 block w-full"
                        />
                    </div>

                    <!-- Blog Buttons -->
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