<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ModerationController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contacts', function () {
    $contacts = [
        [
            'title' => 'Электронная почта',
            'value' => 'news@example.com',
        ],
        [
            'title' => 'Телефон',
            'value' => '+7 (012) 345-67-89',
        ],
        [
            'title' => 'Адрес',
            'value' => 'Москва, Россия',
        ],
    ];

    return view('pages.contacts', [
        'contacts' => $contacts,
    ]);
})->name('contacts');

Route::get('/gallery/{slug}', [MainController::class, 'gallery'])
    ->name('gallery');

Route::get('/signin', [AuthController::class, 'create'])
    ->name('signin');

Route::post('/signin', [AuthController::class, 'registration']);

Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::resource('articles', ArticleController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth:sanctum');

Route::resource('articles', ArticleController::class)
    ->only(['index', 'show']);

Route::post('/articles/{article}/comments', [CommentController::class, 'store'])
    ->middleware('auth:sanctum')
    ->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->middleware('auth:sanctum')
    ->name('comments.destroy');

Route::post(
    '/articles/{article}/send',
    [NewsletterController::class, 'send']
)
    ->middleware('auth:sanctum')
    ->name('articles.send');

Route::get('/moderation/comments', [ModerationController::class, 'index'])
    ->middleware('auth:sanctum')
    ->name('moderation.comments');