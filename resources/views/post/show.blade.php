@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="flex justify-center items-center text-center bg-blue-500 text-white text-2xl rounded-lg m-2 p-5">
            <div class="alert" role="alert">
                {{ session()->get('message') }}
            </div>
        </div>
    @endif

    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl">{{ $post->title }}</h1>
                <p class="max-w-2xl mb-6 lg:mb-8 md:text-lg lg:text-xl">{{ $post->description }}</p>

                <div class="mt-4 flex justify-between py-6 border-b-4">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Author Avatar" />
                        <div class="ml-3 text-sm font-semibold">
                            <h2 class="text-lg font-semibold">Author: {{ $user->name }}</h2>
                            <span class="text-sm font-light text-gray-700">{{ $user->posts_count }} Posts</span>
                            <span class="font-normal block">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    @if(Auth::check() && Auth::id() == $post->user_id)
                        <div class="flex space-x-4">
                            <a href="{{ url('/post/' . $post->slug . '/edit') }}" class="bg-yellow-500 text-white py-3 px-6 rounded-lg font-bold uppercase shadow-md transition-all hover:shadow-lg">
                                Edit
                            </a>
                            <form method="POST" action="{{ url('/post/' . $post->slug) }}" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 text-white py-3 px-6 rounded-lg font-bold uppercase shadow-md transition-all hover:shadow-lg">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex rounded-lg">
                <img src="/images/{{ $post->image_path }}"   alt="Post image" class="rounded-lg object-fill" style="width: 600px; height: 500px;">
            </div>
        </div>
    </section>






@endsection






