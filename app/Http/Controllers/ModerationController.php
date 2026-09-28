<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ModerationController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('moderator');

        $comments = Comment::with(['user', 'article'])
            ->latest()
            ->paginate(10);

        return view('moderation.comments', [
            'comments' => $comments,
        ]);
    }
}