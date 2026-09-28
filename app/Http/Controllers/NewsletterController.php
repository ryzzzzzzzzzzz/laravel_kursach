<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewsMail;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NewsletterController extends Controller
{
    use AuthorizesRequests;

    public function send(Article $article)
    {
        $this->authorize('moderator');

        $users = User::all();

        foreach ($users as $user) {
            SendNewsMail::dispatch($user, $article);
        }

        return redirect()
            ->route('articles.show', $article)
            ->with(
                'success',
                'Рассылка добавлена в очередь.'
            );
    }
}