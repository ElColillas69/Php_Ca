@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    
    <div class="w-4/5 mx-auto text-center py-15">
        <h1 class="text-4xl md:text-6xl font-bold">Blog Post</h1>
    </div>

    @if (session()->has('message'))
    <div class="w-4/5 mx-auto mt-10 pl-2">
        <p class="w-full md:w-2/6 mb-4 text-gray-50 bg-green-500 rounded-lg py-4">{{ session()->get('message') }}</p>
    </div>
    @endif

    <div class="w-4/5 mx-auto py-10">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="w-full h-auto md:h-64 object-cover rounded-t-lg">
            <div class="p-6">
                <h2 class="text-xl md:text-3xl font-bold text-gray-800">{{ $post->title }}</h2>
                <p class="text-gray-600">By <span class="font-semibold">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</p>
                <p class="text-gray-700 mt-4">{{ $post->description }}</p>
                <div class="flex justify-between items-center mt-6">
                    <form id="like-form" action="{{ route('like.post', $post->id) }}" method="POST" class="flex items-center space-x-1">
                        @csrf
                        <button id="like-btn" type="submit" class="bg-transparent hover:bg-transparent text-gray-800 font-bold py-2 px-4 rounded">
                            <img id="like-icon" src="{{ $post->liked ? 'https://image.flaticon.com/icons/png/512/456/456115.png' : 'https://media.istockphoto.com/id/1136351242/vector/like-social-media-hand-line-icon-editable-stroke-pixel-perfect-for-mobile-and-web.jpg?s=612x612&w=0&k=20&c=OnKkq5JCHkLvZ1Ck_njtTQMCyLljXsXGNhGqVpwwVUA=' }}" alt="Like" class="w-6 h-6">
                            <span class="text-xs">{{ $post->likes }}</span>
                        </button>
                    </form>
                    <button id="toggle-articles" class="uppercase bg-blue-500 hover:bg-blue-600 text-white font-bold text-lg py-2 px-6 rounded-md">Keep Reading</button>
                </div>
            </div>
        </div>
    </div>

    <div id="articles-section" class="w-4/5 mx-auto py-10" style="display: none;">
        <h2 class="text-3xl font-bold mb-6">Articles</h2>
        @foreach($articles as $article)
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800">{{ $article->title }}</h3>
                <p class="text-gray-700 mt-2">{{ $article->content }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    document.getElementById('like-form').addEventListener('submit', function(event) {
        event.preventDefault();
        let likeIcon = document.getElementById('like-icon');
        let likeCount = parseInt(likeIcon.nextElementSibling.textContent);

        fetch(this.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                _token: '{{ csrf_token() }}'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Toggle like icon
                if (likeIcon.src.includes('filled')) {
                    likeIcon.src = 'https://media.istockphoto.com/id/1136351242/vector/like-social-media-hand-line-icon-editable-stroke-pixel-perfect-for-mobile-and-web.jpg?s=612x612&w=0&k=20&c=OnKkq5JCHkLvZ1Ck_njtTQMCyLljXsXGNhGqVpwwVUA=';
                    likeCount--;
                } else {
                    likeIcon.src = 'https://image.flaticon.com/icons/png/512/456/456115.png';
                    likeCount++;
                }
                // Update like count
                likeIcon.nextElementSibling.textContent = likeCount;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    document.getElementById('toggle-articles').addEventListener('click', function() {
        let articlesSection = document.getElementById('articles-section');
        if (articlesSection.style.display === 'none') {
            articlesSection.style.display = 'block';
        } else {
            articlesSection.style.display = 'none';
        }
    });
</script>

@endsection
