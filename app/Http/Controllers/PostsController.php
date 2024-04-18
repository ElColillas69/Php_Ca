<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Article;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $searchQuery = $request->input('query');
    
        if ($searchQuery) {
           
            $postResults = Post::where('title', 'like', '%'.$searchQuery.'%')->get();
    
            
            $articleResults = Article::where('title', 'like', '%'.$searchQuery.'%')->get();
    
          
            $posts = $postResults->merge($articleResults);
        } else {
           
            $posts = Post::all();
        }
    
        $articles = Article::all();
    
        return view('blog.index', compact('posts', 'articles'));
    }
    

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'articles.*.title' => 'required',
            'articles.*.content' => 'required',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
        ]);

        foreach ($request->input('articles') as $articleData) {
            $post->articles()->create($articleData);
        }

        return redirect('/blog')->with('message', 'Your post with articles has been added!');
    }
    public function showPostWithArticle($postSlug, $articleSlug)
    {
       
        $post = Post::where('slug', $postSlug)->with('articles')->first();
        $article = $post->articles->where('slug', $articleSlug)->first();
    
        if (!$post || !$article) {
            abort(404); 
        }
    
        return view('blog.show', compact('post', 'article'));
    }
    
    public function show($postId)
{
    $post = Post::find($postId);
    $articles = Article::where('post_id', $postId)->get();
    $posts = []; // Define the $posts variable

    if ($post || $articles->isNotEmpty()) {
        return view('blog.show', compact('post', 'articles', 'posts')); // Pass the $posts variable to the view
    }

    abort(404);
}





public function edit($id)
{
    $post = Post::find($id);

    if (!$post) {
        abort(404, "Post with ID $id not found");
    }

    $articles = Article::where('post_id', $id)->get();

    return view('blog.edit', compact('post', 'articles'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'article_titles.*' => 'required',
        'article_contents.*' => 'required',
    ]);

   
    Post::where('id', $id)
        ->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ]);

   
    $articleData = [];

    foreach ($request->input('article_titles') as $index => $articleTitle) {
        $articleData[] = [
            'title' => $articleTitle,
            'content' => $request->input('article_contents.' . $index),
        ];
    }

    $post = Post::find($id);
    $post->articles()->delete(); // Delete existing articles

    $post->articles()->createMany($articleData);

    return redirect('/blog')->with('message', 'Your post and articles have been updated!');
}
public function likePost(Post $post)
{
    if (!$post->liked) {
        $post->increment('likes');
        $post->liked = true;
    } else {
        $post->decrement('likes');
        $post->liked = false;
    }
    $post->save();

    return response()->json(['success' => true]);
}


public function destroy($id)
{
    $post = Post::find($id);

    if (!$post) {
        abort(404, "Post with ID $id not found");
    }

    
    $post->articles()->delete();

   
    $post->delete();

    return redirect('/blog')->with('message', 'Your post and associated articles have been deleted!');
}
}
