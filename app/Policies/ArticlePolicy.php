<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Article $article): bool
    {
        return true;
    }

    public function create(User $user): Response
    {
        return Response::deny(
            'У вас недостаточно прав для создания статьи.'
        );
    }

    public function update(User $user, Article $article): Response
    {
        return Response::deny(
            'У вас недостаточно прав для редактирования статьи.'
        );
    }

    public function delete(User $user, Article $article): Response
    {
        return Response::deny(
            'У вас недостаточно прав для удаления статьи.'
        );
    }

    public function restore(User $user, Article $article): Response
    {
        return Response::deny(
            'У вас недостаточно прав для восстановления статьи.'
        );
    }

    public function forceDelete(User $user, Article $article): Response
    {
        return Response::deny(
            'У вас недостаточно прав для окончательного удаления статьи.'
        );
    }
}