@extends('layouts.app')
@section('title', 'Blogs')

@section('content')
<div class="max-w-7xl mx-auto sm:px-3">
    <div class="bg-amber-400 mt-8 py-10">
        <h1 class="text-4xl font-extrabold capitalize text-center">Blogs of your interest</h1>
    </div>
    <h2 class="lg:text-3xl sm:text-5xl underline pt-4 font-extrabold sm:px-5">All Blogs</h2>
    <div class="py-4 grid-cols-1 sm:grid md:grid-cols-3">
        @forelse($blogs as $blog)
            <div class="hover:shadow-xl p-3 flex flex-col gap-4 border bg-white mx-3 mt-6 rounded-lg bg-white dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <img class="rounded-t-lg" src="{{$blog->image}}" width="100%" height="200"/>
                <a href="{{route('blog.singleBlog',['id' => $blog->id])}}" class="text-2xl font-extrabold hover:text-lime-600">{{$blog->title}}</a>
                <p class="text-2xl lg:text-lg">{{ Str::limit($blog->description, 100) }}</p>
            </div>
        @empty
            <p class="text-center text-xl text-red-500 p-8">No Blogs Available</p>
        @endforelse
        
    </div>
    <div class="">
        {{ $blogs->links() }}
    </div>
</div>
@endsection