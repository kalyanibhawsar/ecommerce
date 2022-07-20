<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
                @if (session()->has('status'))
                    <div class="mb-5 shadow bg-green-300 text-white font-bold py-2 px-4 rounded">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mb-4">
                    <h1 class="font-serif text-3xl font-bold decoration-gray-400">
                   Edit Post
                    </h1>
                </div>
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-300">
                    <form method="post" action="{{route('post_update', $post->id)}}">
                        @csrf
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700" for="title">
                            Title
                            </label>
                            <input
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="title"  value="{{$post->title}}"/>
                        </div>

                        <!-- Body -->
                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="body" >
                            Body
                            </label>
                            <textarea name="body" type="submit" 
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-3 py-3"
                            rows="4">{{$post->body}}</textarea>
                        </div>

                        <div class="flex items-center justify-start mt-4 gap-x-2">
                            <button type="submit"
                            class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-blue-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                           Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
