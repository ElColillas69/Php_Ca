@extends('layouts.app')

@section('content')
<div class="w-4/5 mx-auto">
    <div class="py-8">
        <h1 class="text-4xl font-semibold text-center">Create Post</h1>
    </div>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('articles.store', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter title">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="4" placeholder="Enter description"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                <input type="file" name="image" id="image" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Articles:</h2>
                <div id="articles-container">
                    <div class="article mb-4">
                        <input type="text" name="article_titles[]" placeholder="Article Title..." class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <textarea name="article_descriptions[]" placeholder="Article Description..." class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3"></textarea>
                    </div>
                </div>
                <button type="button" id="add-article" class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-2 focus:outline-none focus:shadow-outline">Add Article</button>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Create Post</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-article').addEventListener('click', function() {
        var articlesContainer = document.getElementById('articles-container');
        var newArticle = document.createElement('div');
        newArticle.classList.add('article', 'bg-white', 'shadow-md', 'rounded', 'p-4', 'mb-4');
        newArticle.innerHTML = `
            <input type="text" name="article_titles[]" placeholder="Article Title..." class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <textarea name="article_descriptions[]" placeholder="Article Description..." class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3"></textarea>
        `;
        articlesContainer.appendChild(newArticle);
    });
</script>

@endsection
