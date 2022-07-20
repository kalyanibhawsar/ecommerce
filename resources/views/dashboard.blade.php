<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-10"><a href="{{route('post_create')}}" class="float-right px-6 py-2 m-5 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-green-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 text-white"> Add Post</a></div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session()->has('status'))
                        <div class="mb-5 shadow bg-green-400 text-white font-bold py-2 px-4 rounded">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                   <div class="container flex justify-center mx-auto w-full">
                        
                        <div class="w-full">
                            <div class="border-b border-gray-200 shadow">
                                @if ($posts)
                                <table class="divide-y divide-gray-300 w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                S. No
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Name
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Title
                                            </th>
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Body
                                            </th>
                                            
                                            <th class="px-6 py-2 text-xs text-gray-500">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-300">
                                       @php
                                        $i = 1
                                        @endphp
                                        @foreach ($posts as $post)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-800"> {{ $i }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-800"> {{ $post->user->name }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-800">
                                                    {{ $post->title }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div class="text-sm text-gray-800 truncate w-28 " >{{ $post->body }}</div>

                                                @if (count(explode(' ', $post->body)) > 10)
                                                    <button type="button" class="btn btn-secondary text-sm text-gray-400" data-toggle="tooltip" data-html="true" title="{{ $post->body }}">Read more</button>
                                                @endif
                                               
                                            </td>
                                            
                                            <td class="px-6 py-4">
                                                <a href="{{url('post/edit', $post->id)}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                                <a href="{{url('post/delete', $post->id)}}" class="px-4 py-1 text-sm text-white bg-red-400 rounded" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                        @php
                                            $i++ 
                                        @endphp 
                                        @endforeach
                                    </tbody>
                                </table>
                               
                                    @else
                                    <p>Post not available.</p>
                                @endif
                            </div>
                             <div class="m-5">{{$posts->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
