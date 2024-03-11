@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative">
        <img src="https://capital-placement.com/wp-content/uploads/2021/07/The-benefits-of-travelling.jpg" class="w-full" alt="Travel Image">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-black">
                <h1 class="text-5xl sm:text-6xl uppercase font-bold text-shadow-md pb-14">
                    Discover Exciting Places to Travel and Explore
                </h1>
                <a href="/blog" class="inline-block bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase rounded-lg shadow-lg hover:bg-gray-300 transition duration-300">
                    Read More
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://live-production.wcms.abc-cdn.net.au/322b36b1e1f99ff89977c7cca19280b0?impolicy=wcms_crop_resize&cropH=1125&cropW=1998&xPos=1&yPos=0&width=862&height=485" width="700" alt="Travel Image">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Explore New Destinations and Hidden Gems
            </h2>
            
            <p class="py-8 text-gray-500 text-lg">
                Dive into captivating travel guides, recommendations, and insider tips to plan your next unforgettable adventure.
            </p>

            <p class="font-extrabold text-gray-600 text-lg pb-9">
                Join us on a journey to uncover breathtaking landscapes, vibrant cultures, and thrilling experiences around the world.
            </p>

            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-3 px-8 rounded-3xl inline-block hover:bg-blue-700 transition duration-300">
                Find Out More
            </a>
        </div>
    </div>

    <!-- Expertise Section -->
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5"> 
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
        <span class="uppercase text-sm text-gray-400">
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

                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl inline-block hover:bg-gray-100 hover:text-gray-700 transition duration-300">
                    Find Out More
                </a>
            </div>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2l0eXxlbnwwfHwwfHx8MA%3D%3D" alt="City Image">
        </div>
    </div>
@endsection
