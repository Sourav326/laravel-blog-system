@extends('layouts.app')
@section('title', 'Blogs')

@section('content')
<div class="max-w-7xl mx-auto sm:px-3 py-8">
    <img src="{{$blog->image}}" alt="{{$blog->title}}"  class="w-full h-96" />
    <h1 class="text-6xl font-bold py-8 capitalize">{{$blog->title}}</h1>
    <p class="text-xl">{{$blog->description}}</p>
    
   <div class="py-8 flex gap-4">
    <button class="bg-blue-200 px-8 py-3 w-auto capitalize">By {{$blog->user->name}}</button>
    <button class="bg-orange-200 px-8 py-3 w-auto">Updated on: {{date_format($blog->updated_at,"M d Y")}}</button>
   </div>


   <div class="py-8">
   @error('comment')
        <div class="max-w-7xl mx-auto mt-10 bg-red-100 p-3 text-red-600 text-xl">{{ $message }}</div>
    @enderror
   <form method="POST" action="{{route('comment.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex gap-10 pb-10">
                <div class="w-full">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">Comment</label>
                    <textarea rows="5" name="comment" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"></textarea>
                </div>
        </div>
        <input type="hidden" name="blog_id" value="{{$blog->id}}" />
        <button type="submit" class="py-2 px-4 bg-lime-600 text-white">Add Comment</button>
    </form>


    <h2 class="text-3xl font-bold py-8 capitalize border-b border-stone-950">Comments</h2>
   
    @forelse($blog->comments as $comment)
        <div class="bg-white p-4 mt-4 border-l-4 border-orange-400">
            <p>{{$comment->commment}}</p>
            <p class="font-black text-lime-800">By {{$comment->user->name}}</p>
        </div>
    @empty
        <p class="text-center text-xl text-red-500 p-8">No Comments Available</p>
    @endforelse
    
   </div>
</div>
@endsection