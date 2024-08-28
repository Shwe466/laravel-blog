<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    {{ Auth::user()->name }}さん、こんにちは！記事投稿サイトへようこそ。

                    <button class="btn btn-primary bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 focus:bg-gray-700">
                        <a href="{{ route('posts.index') }}" >{{ __('Go to Blog Posts') }}</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
