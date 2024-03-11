<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Article; 

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
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
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => \Str::slug($request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $articles = $post->articles;
        return view('blog.show', compact('post', 'articles'));
    }

    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => \Str::slug($request->title), 
                'user_id' => auth()->user()->id
            ]);

        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }

    public function createArticle($postId)
    {
        $post = Post::findOrFail($postId);
        return view('blog.create-article', compact('post'));
    }

    public function storeArticle(Request $request, $postId)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->post_id = $postId;
        $article->save();

        return redirect()->route('posts.show', ['slug' => $article->post->slug])
            ->with('success', 'Article created successfully.');
    }

    public function editArticle($postId, $articleId)
    {
        $article = Article::findOrFail($articleId);
        return view('blog.edit-article', compact('article'));
    }

    public function updateArticle(Request $request, $postId, $articleId)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $article = Article::findOrFail($articleId);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();

        return redirect()->route('posts.show', ['slug' => $article->post->slug])
            ->with('success', 'Article updated successfully.');
    }
}
