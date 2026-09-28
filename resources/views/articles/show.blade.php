@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <section class="content-section">
        <p class="section-label">Статья</p>

        <h1>{{ $article->title }}</h1>

        <p class="article-description">
            {{ $article->description }}
        </p>

        <div class="article-content">
            {!! nl2br(e($article->content)) !!}
        </div>

        <section class="comments-section">
            <h2>Комментарии</h2>

            @if (session('success'))
                <p class="success-message">
                    {{ session('success') }}
                </p>
            @endif

            @forelse ($article->comments as $comment)
                <article class="comment">
                    <p class="comment-author">
                        {{ $comment->user->name }}
                    </p>

                    <p>{{ $comment->content }}</p>

                    <p class="comment-date">
                        {{ $comment->created_at->format('d.m.Y H:i') }}
                    </p>

                    @can('delete', $comment)
                        <form
                            action="{{ route('comments.destroy', $comment) }}"
                            method="POST"
                            class="comment-delete-form"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-button">
                                Удалить комментарий
                            </button>
                        </form>
                    @endcan
                </article>
            @empty
                <p>Комментариев пока нет.</p>
            @endforelse

            @auth
                <form
                    action="{{ route('comments.store', $article) }}"
                    method="POST"
                    class="auth-form comment-form"
                >
                    @csrf

                    <div class="form-field">
                        <label for="content">Добавить комментарий</label>

                        <textarea
                            id="content"
                            name="content"
                            rows="4"
                            required
                        >{{ old('content') }}</textarea>

                        @error('content')
                            <p class="form-error">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="form-button">
                        Отправить комментарий
                    </button>
                </form>
            @endauth
        </section>

        <div class="article-actions">
        @can('update', $article)
            <a
                href="{{ route('articles.edit', $article) }}"
                class="news-link"
            >
                Редактировать
            </a>
        @endcan

        @can('delete', $article)
            <form
                action="{{ route('articles.destroy', $article) }}"
                method="POST"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="delete-button">
                    Удалить
                </button>
            </form>
        @endcan

        @can('moderator')
            <form
                action="{{ route('articles.send', $article) }}"
                method="POST"
            >
                @csrf

                <button type="submit" class="form-button">
                    Отправить рассылку
                </button>
            </form>
        @endcan

            <a
                href="{{ route('articles.index') }}"
                class="news-link"
            >
                К списку статей
            </a>
        </div>
    </section>
@endsection