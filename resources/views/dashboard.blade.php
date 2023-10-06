@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto mb-16 mt-8 p-8 bg-white">
    <div class="mb-8 flex justify-between">
        <h1 class="text-2xl font-bold ">Blogs</h1>
        <a href="{{route('user.blog.create')}}" class="py-2 px-4 bg-lime-600 text-white">+ Add New</a>
    </div>
    
    <table class="border-collapse border border-slate-400 table-auto w-full">
        <thead>
            <tr>
                <th class="border border-slate-300 p-3">Image</th>
                <th class="border border-slate-300 p-3">Title</th>
                <th class="border border-slate-300 p-3">Description</th>
                <th class="border border-slate-300 p-3">Status</th>
                <th class="border border-slate-300 p-3">Crated On</th>
                <th class="border border-slate-300 p-3">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($blogs as $blog)
            <tr>
                <td class="border border-slate-300 p-3"><img class="w-20 mx-auto" src="{{$blog->image}}" alt="{{$blog->image}}" /></td>
                <td class="border border-slate-300 p-3">{{$blog->title}}</td>
                <td class="border border-slate-300 p-3">{{ Str::limit($blog->description, 50) }}</td>
                <td class="border border-slate-300 p-3">
                    <a href="{{route('user.blog.updateStatus',['id' => $blog->id])}}" class="capitalize px-4 py-2 text-white {{($blog->status == 'active') ? 'bg-lime-600':'bg-red-600'}}">
                        {{$blog->status}}
                    </a>
                </td>
                <td class="border border-slate-300 p-3">{{date_format($blog->created_at,"M d Y")}}</td>
                <td class="border border-slate-300 p-3">
                    <div class="flex justify-evenly gap-2">
                        <a href="{{route('user.blog.show',['id' => $blog->id])}}" class="py-2 px-4 bg-cyan-600 text-white">View</a>
                        <a href="{{route('user.blog.destroy',['id' => $blog->id])}}" class="py-2 px-4 bg-red-600 text-white">Delete</a>
                    </div>
                </td>
            </tr>
        @empty
            <p class="text-center text-xl text-red-500 p-8">No Blogs Available</p>
        @endforelse
    </tbody>
</table>
{{ $blogs->links() }}
</div>


@endsection