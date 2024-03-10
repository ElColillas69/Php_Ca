<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogArticle;

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
        ]);

        BlogArticle::create($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function show(BlogArticle $article)
    {
        return view('blog.show', compact('article'));
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
