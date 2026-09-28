<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticleController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $articles = Article::latest()->paginate(6);

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        $this->authorize('create', Article::class);

        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $this->authorize('create', Article::class);

        $article = Article::create($request->validated());

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Статья успешно создана.');
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);

        $article->update($request->validated());

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Статья успешно обновлена.');
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Статья успешно удалена.');
    }
}