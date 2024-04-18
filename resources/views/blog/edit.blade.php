@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                Update Post and Articles
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 m-auto pt-20">
        <form action="/blog/update/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input 
                type="text"
                name="title"
                value="{{ $post->title }}"
                class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

            <textarea 
                name="description"
                placeholder="Description..."
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->description }}</textarea> 

           
            @foreach($articles as $index => $article)
                <div class="py-10">
                    <h2 class="text-4xl font-bold mb-4">Article {{ $index + 1 }}</h2>

                    
                    <input 
                        type="text"
                        name="article_titles[]"
                        value="{{ $article->title }}"
                        class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none mb-2">

                 
                    <textarea 
                        name="article_contents[]"
                        placeholder="Article Content..."
                        class="py-10 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $article->content }}</textarea>
                </div>
            @endforeach

            <button    
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Post and Articles
            </button>
        </form>
    </div>
@endsection
