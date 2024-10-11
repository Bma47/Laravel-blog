@extends('layouts.app')

@section('title') Create @endsection

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">
        <h2 class="text-2xl">Create post</h2>

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

    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <form action="{{ url('/post') }}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @csrf

            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
                   name="title"
                   spellcheck="false"
                   placeholder="Title"
                   type="text"
                   required>

            <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200">
                <div class="flex justify-between items-center py-2 px-3 border-b">Description
                    <div class="flex items-center space-x-1 sm:pr-4">
                        <!-- Add your toolbar buttons here if needed -->
                    </div>
                </div>
                <div class="py-2 px-4 bg-white rounded-b-lg">
                    <label for="editor" class="sr-only">Publish post</label>
                    <textarea id="editor" rows="8"
                              class="description bg-gray-100 p-3 border border-gray-300 outline-none block w-full text-sm text-gray-800"
                              placeholder="Write an article..." required
                              name="description"
                              spellcheck="false"></textarea>
                </div>
            </div>

            <!-- Category Selection -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categories">Choose a category:</label>
                <select id="categories" name="category_id" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- File Upload -->
            <div class="mb-4">
                <label for="dropzone-file" class="file-upload-label block text-gray-700 text-sm font-bold mb-2">Click to upload image:</label>
                <input id="dropzone-file" type="file" name="image" class="hidden" required>
                <label for="dropzone-file" class="cursor-pointer bg-gray-100 border border-gray-300 p-2 rounded text-gray-500">Upload</label>
            </div>

            <!-- Buttons -->
            <div class="flex">
                <button type="reset" class="border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</button>
                <button type="submit" class="border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
@endsection
