@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <section class="content-section">
        <p class="section-label">База данных</p>

        <div class="section-heading">
            <div>
                <h1>Новости</h1>
            </div>

            @can('create', App\Models\Article::class)
                <a
                    href="{{ route('articles.create') }}"
                    class="form-button"
                >
                    Добавить статью
                </a>
            @endcan
        </div>

        @if (session('success'))
            <p class="success-message">
                {{ session('success') }}
            </p>
        @endif

        <div class="news-list">
            @foreach ($articles as $article)
                <article class="news-card article-card">
                    <div class="news-card-content">
                        <h2>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h2>

                        <p>{{ $article->description }}</p>

                        <a
                            href="{{ route('articles.show', $article) }}"
                            class="news-link"
                        >
                            Подробнее
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $articles->links('pagination.news') }}
        </div>
    </section>
@endsection