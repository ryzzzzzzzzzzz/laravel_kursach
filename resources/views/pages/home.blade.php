@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <section class="hero">
        <p class="section-label">Новости</p>

        <h1>Последние новости</h1>

        <div class="news-list">
            @foreach ($news as $item)
                <article class="news-card">
                    <a href="{{ route('gallery', ['slug' => $item['slug']]) }}">
                        <img
                            src="{{ $item['preview_image'] }}"
                            alt="{{ $item['title'] }}"
                        >
                    </a>

                    <div class="news-card-content">
                        <h2>{{ $item['title'] }}</h2>

                        <p>{{ $item['description'] }}</p>

                        <a
                            href="{{ route('gallery', ['slug' => $item['slug']]) }}"
                            class="news-link"
                        >
                            Подробнее
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection