@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Discover Exciting Places to Travel and Explore
                </h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Explore New Destinations and Hidden Gems
            </h2>
            
            <p class="py-8 text-gray-500 text-s">
                Dive into captivating travel guides, recommendations, and insider tips to plan your next unforgettable adventure.
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Join us on a journey to uncover breathtaking landscapes, vibrant cultures, and thrilling experiences around the world.
            </p>

            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find Out More
            </a>
        </div>
    </div>

    <!-- Expertise Section -->
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l"> 
            I'm an expert in...
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            Adventure Travel
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Cultural Exploration
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Off-the-Beaten-Path Destinations
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Local Experiences
        </span>
    </div>

    <!-- Blog Section -->
    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Discover New Places
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Delve into our collection of travel articles highlighting must-visit destinations, hidden gems, and insider recommendations.
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    City Breaks
                </span>

                <h3 class="text-xl font-bold py-10">
                    Embark on urban adventures and discover the vibrant culture, history, and attractions of bustling cities around the globe.
                </h3>

                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
        </div>
    </div>
@endsection
