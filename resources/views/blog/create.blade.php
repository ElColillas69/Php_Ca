@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Post
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
        action="/blog"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

        <div class="flex flex-col space-y-4">
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
        </div>

        <button    
            id="add-article"
            type="button"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add Article
        </button>

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Create Post
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
