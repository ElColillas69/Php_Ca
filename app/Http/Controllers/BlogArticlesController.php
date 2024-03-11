<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Post;

class BlogArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('blog.index', compact('articles'));
    }

    public function create()
    {
        $posts = Post::all();
        return view('blog.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        // Create a new Article instance
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->post_id = $request->post_id;
        
        // Save the article into the database
        $article->save();

        // Redirect back with success message
        return redirect()->route('articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $articles = $post->articles;
        return view('post.show', compact('post', 'articles'));
    }

    public function edit(Article $article)
    {
        return view('blog.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }
}
