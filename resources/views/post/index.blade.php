@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6 flex items-start">

        <!-- Main content -->
        <main class="w-full md:w-3/4 p-4">
            <div class="flex justify-between m-2">
                <h2 class="text-3xl font-semibold mb-2 text-gray-800">All Posts</h2>
                @if(Auth::check())
                    <a href="/create" class="bg-green-700 text-white px-4 py-2 rounded-md hover:bg-green-400">Create Post</a>
                @endif
            </div>

            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
                @foreach($posts as $post)
                    <article class="relative w-full bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 ease-in-out hover:shadow-2xl">
                        <img src="/images/{{$post->image_path}}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">
                                <a href="{{ url('/view/' . $post->slug) }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 100) }}</p>
                            <a href="{{ url('/view/' . $post->slug) }}" class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-600">Read More</a>

                        </div>
                    </article>
                @endforeach
            </section>

            <div class="flex justify-center items-center m-auto mt-20">
                {{ $posts->links() }}
            </div>
        </main>

        <!-- Sidebar (Authors and Categories) -->
        <div class="hidden lg:block mt-10">
            <div class="px-8">
                <h1 class="mb-4 text-2xl font-bold text-gray-700">Authors</h1>
                <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                    <ul class="-mx-4">
                        @foreach($users as $user)
                            <li class="flex items-center mt-6">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p>
                                    <a href="#" class="mx-1 font-bold text-gray-700 hover:underline">{{ $user->name }}</a>
                                    <span class="text-sm font-light text-gray-700">{{ $user->posts_count }} Posts</span>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="px-8 mt-10">
                <h1 class="mb-4 text-2xl font-bold text-gray-700">Categories</h1>
                <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                    <ul class="flex flex-col">
                        @foreach($categories as $category)
                            <li class="mt-2">
                                <a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">
                                    <i class="fa-solid fa-laptop-code text-2xl" style="color: #33732b;" ></i>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
