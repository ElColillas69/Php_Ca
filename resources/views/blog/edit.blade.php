@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update Post
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
    <form 
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data">
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

        <div class="mt-8">
            <h2 class="text-3xl font-bold mb-4">Edit Articles</h2>
            <div class="flex flex-col space-y-4">
                @if($post->articles)
                    @foreach($post->articles as $article)
                    <div>
                        <input 
                            type="text"
                            name="article_titles[]"
                            value="{{ $article->title }}"
                            class="bg-transparent block border-b-2 w-full h-16 text-3xl outline-none">
                        <textarea 
                            name="article_descriptions[]"
                            placeholder="Article Description..."
                            class="py-10 bg-transparent block border-b-2 w-full h-40 text-lg outline-none">{{ $article->description }}</textarea>
                    </div>
                    @endforeach
                @else
                    <p>No articles here.</p>
                @endif
            </div>
            <button type="button" id="add-article" class="bg-blue-500 text-white py-2 px-4 rounded mt-4">Add Article</button>
        </div>

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>
    </form>
</div>

<script>
    document.getElementById('add-article').addEventListener('click', function() {
        var articlesContainer = document.querySelector('.flex.flex-col.space-y-4');
        var newArticle = document.createElement('div');
        newArticle.innerHTML = `
            <div>
                <input 
                    type="text"
                    name="article_titles[]"
                    placeholder="Article Title..."
                    class="bg-transparent block border-b-2 w-full h-16 text-3xl outline-none">
                <textarea 
                    name="article_descriptions[]"
                    placeholder="Article Description..."
                    class="py-10 bg-transparent block border-b-2 w-full h-40 text-lg outline-none"></textarea>
            </div>
        `;
        articlesContainer.appendChild(newArticle);
    });
</script>

@endsection
