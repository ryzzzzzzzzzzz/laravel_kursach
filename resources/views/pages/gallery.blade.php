@extends('layouts.app')

@section('title', $news['title'])

@section('content')
    <section class="content-section">
        <p class="section-label">Галерея</p>

        <h1>{{ $news['title'] }}</h1>

        <img
            src="{{ $news['full_image'] }}"
            alt="{{ $news['title'] }}"
            class="gallery-image"
        >

        <p>{{ $news['description'] }}</p>

        <a href="{{ route('home') }}" class="news-link">
            Вернуться к новостям
        </a>
    </section>
@endsection