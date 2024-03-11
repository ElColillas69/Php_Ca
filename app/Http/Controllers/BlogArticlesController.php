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

    public function createArticle(Post $post)
{
    return view('blog.create-article', compact('post'));
}

public function storeArticle(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $article = new Article();
    $article->title = $request->title;
    $article->description = $request->description;
    $article->post_id = $post->id;
    $article->save();

    return redirect()->route('posts.show', ['slug' => $article->post->slug])
        ->with('success', 'Article created successfully.');
}


    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
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
