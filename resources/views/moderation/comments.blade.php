@extends('layouts.app')

@section('title', 'Модерация комментариев')

@section('content')
    <section class="content-section">
        <p class="section-label">Модерация</p>

        <h1>Комментарии пользователей</h1>

        <p>
            На странице представлены комментарии пользователей
            к опубликованным статьям.
        </p>

        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        @if ($comments->isEmpty())
            <p>Комментариев пока нет.</p>
        @else
            <div class="moderation-list">
                @foreach ($comments as $comment)
                    <article class="moderation-comment">
                        <div class="moderation-comment__info">
                            <p>
                                <strong>Автор:</strong>
                                {{ $comment->user->name }}
                            </p>

                            <p>
                                <strong>Статья:</strong>
                                <a href="{{ route('articles.show', $comment->article) }}">
                                    {{ $comment->article->title }}
                                </a>
                            </p>

                            <p>
                                <strong>Дата:</strong>
                                {{ $comment->created_at->format('d.m.Y H:i') }}
                            </p>
                        </div>

                        <p class="moderation-comment__content">
                            {{ $comment->content }}
                        </p>

                        @can('delete', $comment)
                            <form
                                action="{{ route('comments.destroy', $comment) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                >
                                    Удалить комментарий
                                </button>
                            </form>
                        @endcan
                    </article>
                @endforeach
            </div>

            {{ $comments->links() }}
        @endif
    </section>
@endsection