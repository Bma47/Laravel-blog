@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">
        <div class="flex m-auto justify-center">
            <h2 class="text-2xl">Edit Post</h2>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <style>
        body { background:white !important; }
    </style>

    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <form action="{{ url('/post/'.$post->slug) }}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
                   name="title"
                   value="{{ $post->title }}"
                   spellcheck="false"
                   placeholder="Title"
                   type="text">

            <!-- Description -->
            <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                      name="description"
                      spellcheck="false"
                      placeholder="Describe everything about this post here">{{ $post->description }}</textarea>

            <!-- Category Selection -->


            <!-- File Upload -->
            <div class="mb-4">
                <label for="dropzone-file" class="file-upload-label block text-gray-700 text-sm font-bold mb-2">Click to upload new image:</label>
                <input id="dropzone-file" type="file" name="image" class="hidden">
                <label for="dropzone-file" class="cursor-pointer bg-gray-100 border border-gray-300 p-2 rounded text-gray-500">Upload New Image</label>
            </div>

            <!-- Buttons -->
            <div class="buttons flex">
                <button type="reset" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</button>
                <button type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Update Post</button>
            </div>

        </form>
    </div>

@endsection
