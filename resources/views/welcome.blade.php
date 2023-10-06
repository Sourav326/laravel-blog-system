@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <!-- Banner -->
    <div class="relative h-128 w-full bg-[#e1e1e1] flex items-center px-6 lg:px-8 ">
        <div class="max-w-7xl mx-auto flex items-center justify-between flex-col lg:flex-row">
            <div>
                <h1 class="capitalize sm:pt-16 text-6xl lg:text-6xl font-extrabold leading-tight text-center lg:text-left">What
                    is a <br><span class="text-lime-500">Blog</span><br>and its defination</h1>
                <p class="py-5 text-lg text-slate-500 text-center lg:text-left">Blogs are a type of regularly updated
                    websites that provide insight into a certain topic. The word blog is a combined version of the words
                    “web” and “log.”</p>
            </div>
            <img class="w-1/2" src="{{asset('assets/images/header3.png')}}" alt="Delivery Boy">
        </div>
    </div>

    <!-- Latest Blogs Section -->
    <div class="max-w-7xl mx-auto lg:py-12 sm:py-24 sm:p-4">
        <h2 class="lg:text-3xl sm:text-5xl underline pb-4 sm:pb-8 font-extrabold ">Latest Blogs</h2>
        <div class="grid-cols-1 sm:grid md:grid-cols-3">
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

    </div>

@endsection