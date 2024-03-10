@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <div class="blog-image">
                    <img src="{{ asset('..../public/images/' . $post->image_path) }}" alt="Blog Image" class="w-full">
                </div>

                <div class="w-4/5 m-auto text-left py-15">
                    <h1 class="text-6xl">
                        {{ $post->title }}
                    </h1>
                </div>

                <div class="w-4/5 m-auto pt-20">
                    <span class="text-gray-500">
                        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </span>

                    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                        {{ $post->description }}
                    </p>
                </div>

                <div class="flex justify-center mt-8">
                    <a href="/blog" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Go Back</a>
                </div>

            </section>
        </div>
    </div>
</main>
@endsection
