@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto my-16 p-8 bg-white">
    <div class="mb-8 flex justify-between">
        <h1 class="text-2xl font-bold ">Update Blog</h1>
    </div>
    <form method="POST" action="{{route('user.blog.show',['id' => $blog->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="flex gap-10 pb-10">
            <div class="w-full flex flex-col gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">Title</label>
                    <input
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        id="name" type="text" name="title" value="{{$blog->title}}">
                        @error('title')
                                <p class="text-red-500">{{ $message }}</p>
                        @enderror
                </div>
                
                <div class="w-full">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">Description</label>
                    <textarea rows="5" name="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">{{$blog->description}}</textarea>
                    @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <div>
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">Upload Image</label>
                    <input
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        id="selectedImage" type="file" name="image">
                </div>
                <div class="col-md-12 w-full mt-8 h-40">
                    <img id="target" src="{{$blog->image}}" class="w-full h-full">
                </div>
            </div>

        </div>
        <button type="submit" class="py-2 px-4 bg-lime-600 text-white">Update</button>
    </form>
</div>


@endsection