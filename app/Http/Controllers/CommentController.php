<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;
    
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:2000'],
        ]);

        $article->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Комментарий успешно добавлен.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with(
            'success',
            'Комментарий успешно удалён.'
        );
    }
}