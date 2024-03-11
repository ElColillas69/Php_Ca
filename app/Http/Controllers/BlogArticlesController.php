<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogArticle;
use App\Models\Post; 

class BlogArticleController extends Controller
{
    public function index()
    {
        $articles = BlogArticle::all();
        return view('blog.index', compact('articles'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'post_id' => 'required|exists:posts,id', 
        ]);

        $article = new BlogArticle();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->post_id = $request->post_id; 
        $article->save();

        return redirect()->route('articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $articles = Article::where('post_id', $post->id)->get();
        return view('post.show', compact('post', 'articles'));
    }

    public function edit(BlogArticle $article)
    {
        return view('blog.edit', compact('article'));
    }

    public function update(Request $request, BlogArticle $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully');
    }

    public function destroy(BlogArticle $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }
}
