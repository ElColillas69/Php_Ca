@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    
    <div class="w-4/5 m-auto text-center py-15">
        <h1 class="text-6xl">Blog Posts and Articles</h1>
    </div>

   
    <div class="w-4/5 m-auto my-10">
        <form action="{{ route('blog.index') }}" method="GET" class="flex justify-center">
            <input type="text" name="query" class="w-full py-3 px-4 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Search for posts...">
            <button type="submit" class="ml-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 transition duration-300">Search</button>
        </form>
    </div>

   
    @if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">{{ session()->get('message') }}</p>
    </div>
    @endif

    
    @if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a href="/blog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">Create post</a>
    </div>
    @endif

    
    @if ($posts->isEmpty())
    <p class="text-center mt-8">No results found.</p>
    @else
    @foreach ($posts as $post)
  
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
       
        <div>
            <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="post-image">
        </div>
        
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">{{ $post->title }}</h2>
            <span class="text-gray-500">By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
            <p class="font-light text-xl  pt-8 pb-10 leading-8 ">{{ $post->description }}</p>
            
           
            <a href="/blog/{{ $post->id }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Keep Reading</a>

            <div class="float-right flex items-center space-x-4">
            <form action="{{ route('like.post', $post->id) }}" method="POST" class="flex items-center space-x-1">
        @csrf
        <button type="submit" class="bg-transparent hover:bg-transparent text-gray-800 font-bold py-2 px-4 rounded">
            <img src="https://media.istockphoto.com/id/1136351242/vector/like-social-media-hand-line-icon-editable-stroke-pixel-perfect-for-mobile-and-web.jpg?s=612x612&w=0&k=20&c=OnKkq5JCHkLvZ1Ck_njtTQMCyLljXsXGNhGqVpwwVUA=" alt="Like" class="w-6 h-6">
            <span class="text-xs">{{ $post->likes }}</span>
        </button>
    </form>
    </div>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <div class="float-right flex items-center space-x-4">
    <a href="/blog/{{ $post->id }}/edit" class="text-gray-700 italic hover:text-gray-900 ">
        Edit
    </a>

    <form action="/blog/update/{{ $post->id }}" method="POST">
        @csrf
        @method('delete')

        <button class="text-red-500 pr-3" type="submit">
            Delete
        </button>
    </form>

    
</div>

@endif
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection
