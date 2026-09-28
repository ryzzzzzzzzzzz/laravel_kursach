<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function delete(User $user, Comment $comment): Response
    {
        return Response::deny(
            'У вас недостаточно прав для удаления комментария.'
        );
    }
}