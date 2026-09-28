<?php

namespace App\Jobs;

use App\Mail\NewsMail;
use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendNewsMail implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public User $user,
        public Article $article
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->user->email)->send(
            new NewsMail($this->article)
        );
    }
}