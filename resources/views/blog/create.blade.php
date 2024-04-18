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
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" placeholder="Title..." class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

            <textarea name="description" placeholder="Description..." class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

            <div class="bg-grey-lighter pt-15">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div>

            <div class="w-4/5 m-auto pt-20">
                <h2 class="text-3xl font-extrabold">Add Articles</h2>

                @csrf

                <input type="text" name="articles[0][title]" placeholder="Article Title..."
                       class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <textarea name="articles[0][content]" placeholder="Article Content..."
                          class="py-10 bg-transparent block border-b-2 w-full h-60 text-lg outline-none"></textarea>

                

                <div id="article-fields"></div>

                <button type="submit"
                        class="uppercase mt-10 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Post
                </button>
                <button type="button" onclick="addArticleField()"
                        class="uppercase mt-5 bg-green-500 text-gray-100 text-lg font-extrabold py-2 px-4 rounded-2xl">
                    Add Another Article
                </button>
            </form>
        </div>
    </div>

    <script>
        let articleCount = 1;

        function addArticleField() {
            const articleFields = document.getElementById('article-fields');
            const newArticleField = document.createElement('div');
            newArticleField.innerHTML = `
                <input type="text" name="articles[${articleCount}][title]" placeholder="Article Title..."
                       class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <textarea name="articles[${articleCount}][content]" placeholder="Article Content..."
                          class="py-10 bg-transparent block border-b-2 w-full h-60 text-lg outline-none"></textarea>
            `;
            articleFields.appendChild(newArticleField);
            articleCount++;
        }
    </script>
@endsection
